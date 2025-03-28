<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Filament\Resources\ReviewResource\RelationManagers;
use App\Models\Review;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Config;
use Filament\Tables\Actions\ViewAction;

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
                    Section::make('User Information')->schema([
                        Forms\Components\TextInput::make('username')
                            ->label('Username')
                            ->disabled() // Prevents editing
                            ->formatStateUsing(fn($state, $record) => $record->user->username ?? 'N/A'), // Fetch email from related user

                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->disabled() // Prevents editing
                            ->formatStateUsing(fn($state, $record) => $record->user->email ?? 'N/A'), // Fetch email from related user
                    ])->columns(2),
                ])->columnSpanFull(),


                Group::make()->schema([
                    Section::make('Review Details')->schema([
                        Forms\Components\TextInput::make('product_name')
                        ->label('Product Name')
                        ->formatStateUsing(fn($state, $record) => $record?->product?->product_name ?? 'N/A')
                        ->disabled()
                        ->columnspan(4),


                    Forms\Components\TextInput::make('variant_name')
                        ->label('Variant')
                        ->formatStateUsing(fn($state, $record) => $record?->variant?->name ?? 'No Variant')
                        ->disabled()
                        ->columnspan(1),

                        Forms\Components\TextInput::make('rating')
                            ->label('Rating')
                            ->disabled() // Prevent user from changing
                            ->formatStateUsing(fn($state) => str_repeat('⭐', $state)) // Convert number to stars
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('comment')
                            ->label('Comment')
                            ->nullable()
                            ->rows(4)
                            ->columnSpanFull(),

                        Forms\Components\Placeholder::make('images_display')
                            ->label('Images')
                            ->content(function (Get $get) {
                                $imagePaths = $get('images');
                                if (!$imagePaths) {
                                    return 'No images available';
                                }

                                $imagePaths = is_array($imagePaths) ? $imagePaths : json_decode($imagePaths, true);

                                $html = <<<HTML
                                    <div x-data="{ open: false, imageUrl: '' }">
                                        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                                    HTML;

                                foreach ($imagePaths as $image) {
                                    $imageUrl = asset('storage/' . ltrim($image, '/'));
                                    $html .= <<<HTML
                                            <img src="$imageUrl" 
                                                alt="Review Image" 
                                                @click="imageUrl='$imageUrl'; open=true" 
                                                style="width: 100px; height: 100px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd; margin-bottom: 8px; cursor: pointer;">
                                    HTML;
                                }

                                $html .= <<<HTML
                                        </div>
                                        <!-- Modal -->
                                        <div x-show="open" class="fixed inset-0 flex items-center justify-center z-50">
                                        <div class="absolute inset-0 bg-black bg-opacity-50 backdrop-blur" @click="open=false"></div>
                            
                                        <div class="relative bg-white rounded-lg p-4 shadow-lg max-w-[90%] max-h-[90%] z-10">
                                        <button @click="open=false"  class="absolute top-0 right-0 text-gray-600 text-2xl z-20">&times;</button>
                                                <img :src="imageUrl" class="max-w-full max-h-screen rounded-lg">
                                            </div>
                                        </div>
                                    </div>
                                    HTML;

                                return new \Illuminate\Support\HtmlString($html);
                            }) ->columnSpanFull(),
                    ])->columns(5),
                ])->columnSpanFull(),
            ])->columns(5);
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
                    ->limit(30)
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
                    ->limit(30) // Show only first 30 characters
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
                    ->options([
                        1 => '⭐ 1 Star',
                        2 => '⭐⭐ 2 Stars',
                        3 => '⭐⭐⭐ 3 Stars',
                        4 => '⭐⭐⭐⭐ 4 Stars',
                        5 => '⭐⭐⭐⭐⭐ 5 Stars',
                    ]),
                Filter::make('flagged_reviews')
                    ->label('Flagged Reviews')
                    ->query(fn(Builder $query) => $query->where(function ($query) {
                        $words = Config::get('review_filter.inappropriate_words', []); // Fetch words from config
                        foreach ($words as $word) {
                            $query->orWhere('comment', 'LIKE', "%$word%");
                        }
                    })),

            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    // Tables\Actions\ViewAction::make(),
                    ViewAction::make()
                        ->modalWidth('5xl'), // Adjust the modal width (try 'xl', '3xl', 'full', or a custom width)
                    // // Tables\Actions\EditAction::make(),
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
            // 'create' => Pages\CreateReview::route('/create'),
            // 'edit' => Pages\EditReview::route('/{record}/edit'),
            // 'view' => Pages\ViewReview::route('/{record}/view'),
        ];
    }
}