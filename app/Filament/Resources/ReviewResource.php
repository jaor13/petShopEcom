<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Filament\Resources\ReviewResource\RelationManagers;
use App\Models\Review;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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


                Forms\Components\Hidden::make('user_id')
                ->default(fn () => auth()->id()), // Automatically set user_id

                
                Forms\Components\Select::make('product_id')
                ->label('Product')
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
                ->label('Product Variant')
                ->options(function (callable $get) {
                    $productId = $get('product_id'); // Get selected product ID
                    if (!$productId) return [];
            
                    $user = auth()->user();
            
                    // Find the ordered variant of the selected product (if exists)
                    $variant = \App\Models\OrderItem::whereHas('order', function ($query) use ($user) {
                            $query->where('user_id', $user->id)
                                  ->where('status', 'delivered'); // Only delivered orders
                        })
                        ->where('product_id', $productId)
                        ->whereNotNull('variant_id') // Ensure the product has a variant
                        ->first();
            
                    if ($variant) {
                        return [$variant->variant_id => $variant->variant->variant_name]; // Auto-select the ordered variant
                    }
            
                    return []; // No variant found
                })
                ->reactive() // Ensures automatic updates when product changes
                ->afterStateUpdated(fn (callable $set) => $set('variant_id', null)) // Reset if product changes
                ->nullable() // Allows it to be empty if no variant exists
                ->searchable(),
            
            

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
                ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
    
                Tables\Columns\TextColumn::make('user.email') // Assuming a relationship with User
                    ->label('User')
                    ->sortable()
                    ->searchable(),
    
                Tables\Columns\TextColumn::make('product.product_name') // Assuming a relationship with Product
                    ->label('Product')
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
                    ->limit(3), 
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('rating')
                    ->label('Rating')
                    ->options([
                        5 => '5 Stars',
                        4 => '4 Stars',
                        3 => '3 Stars',
                        2 => '2 Stars',
                        1 => '1 Star',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}
