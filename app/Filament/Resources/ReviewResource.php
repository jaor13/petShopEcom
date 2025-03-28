<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Filament\Resources\ReviewResource\RelationManagers;
use App\Models\Review;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Config;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    protected static ?string $pluralLabel = 'Product Reviews'; // Plural label

    protected static ?string $navigationGroup = 'Product Management';

    protected static ?string $slug = 'product-management-reviews';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Group::make()->schema([
                    Section::make('Product Information')->schema([
                        Forms\Components\Hidden::make('user_id')
                            ->default(fn() => auth()->id()), // Automatically set user_id


                        Forms\Components\Select::make('product_id')
                            ->label('Product Name')
                            ->relationship('product', 'product_name')
                            ->options(function () {
                                return auth()->user()
                                    ->orders()
                                    ->whereHas('orderItems', function ($query) {
                                        $query->whereHas('order', function ($orderQuery) {
                                            $orderQuery->where('status', 'delivered'); // Only delivered orders
                                        });
                                    })
                                    ->with('orderItems.product') // Load product relationship
                                    ->get()
                                    ->flatMap(function ($order) {
                                        return $order->orderItems->map(function ($item) {
                                            return [
                                                'id' => $item->product->id,
                                                'name' => $item->product->product_name
                                            ];
                                        });
                                    })
                                    ->pluck('name', 'id'); // Correct pluck usage
                            })

                            ->searchable(),

                        Forms\Components\Select::make('variant_id')
                            ->label('Variant')
                            ->options(function (callable $get) {
                                $productId = $get('product_id'); // Get selected product ID
                                if (!$productId)
                                    return [];

                                $user = auth()->user();

                                return \App\Models\OrderItem::whereHas('order', function ($query) use ($user) {
                                    $query->where('user_id', $user->id)
                                        ->where('status', 'completed'); // Only delivered orders
                                })
                                    ->where('product_id', $productId)
                                    ->whereNotNull('variant_id') // Ensure the product has a variant
                                    ->with('variant') // Load the variant relationship
                                    ->get()
                                    ->mapWithKeys(fn($item) => [$item->variant_id => $item->variant->name]) // Correct display mapping
                                    ->toArray();
                            })
                            ->reactive() // Updates when product_id changes
                            ->afterStateUpdated(fn(callable $set) => $set('variant_id', null)) // Reset on change
                            ->nullable() // Allow empty if no variant exists
                            ->searchable()
                            ->preload() // Load options immediately
                            ->native(false), // Use Filament’s custom dropdown

                    ])->columns(2),

                ]),


                Group::make()->schema([
                    Section::make('Ratings and Reviews')->schema([
                        Forms\Components\Radio::make('rating')
                            ->label('Rating')
                            ->options([
                                5 => '⭐⭐⭐⭐⭐',
                                4 => '⭐⭐⭐⭐',
                                3 => '⭐⭐⭐',
                                2 => '⭐⭐',
                                1 => '⭐',
                            ])
                            ->required()
                            ->inline(),


                        Forms\Components\Textarea::make('comment')
                            ->label('Review Comment')
                            ->nullable()
                            ->rows(4)
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('images')
                            ->label('Review Images')
                            ->multiple() // Allows multiple file uploads
                            ->directory('reviews') // Store in 'storage/app/public/reviews'
                            ->image() // Restrict to image files
                            ->nullable()
                            ->columnSpanFull(),


                    ])
                ])
            ])->columns(1);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('user.username') // Assuming a relationship with User
                    ->label('User')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('product.product_name') // Assuming a relationship with Product
                    ->label('Product')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('variant.name') // Assuming a relationship with Variant
                    ->label('Variant')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('rating')
                    ->label('Rating')
                    ->sortable(),

                Tables\Columns\TextColumn::make('comment')
                    ->label('Comment')
                    ->limit(50) // Show only first 50 characters
                    ->sortable()
                    ->searchable(),

                Tables\Columns\ImageColumn::make('images')
                    ->label('Review Images')
                    ->limit(2),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('rating')
                    ->label('Rating')
                    ->options(function () {
                        return \App\Models\Review::query()
                            ->distinct()
                            ->pluck('rating') // Get unique rating values from DB
                            ->mapWithKeys(fn($rating) => [$rating => "$rating Stars"]) // Map to options
                            ->toArray();
                    }),
                Filter::make('flagged_reviews')
                    ->label('Flagged Reviews')
                    ->query(fn (Builder $query) => $query->where(function ($query) {
                        $words = Config::get('review_filter.inappropriate_words', []); // Fetch words from config
                        foreach ($words as $word) {
                            $query->orWhere('comment', 'LIKE', "%$word%");
                        }
                    })),

            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    // Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            // 'edit' => Pages\EditReview::route('/{record}/edit'),
            'view' => Pages\ViewReview::route('/{record}/view'),
        ];
    }
}
