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

                // Forms\Components\Select::make('product_id')
                // ->label('Product')
                // ->relationship('product', 'product_name')
                // ->options(function () {
                //     return auth()->user()
                //         ->orders()
                //         ->whereHas('OrderItems', function ($query) {
                //             $query->whereHas('order', function ($orderQuery) {
                //                 $orderQuery->where('status', 'delivered'); // Only delivered orders
                //             });
                //         })
                //         ->with('orderItems.product')
                //         ->get()
                //         ->pluck('orderItems.product.product_name', 'orderItems.product.id');
                // })
                // ->required()
                // ->searchable(),

            Forms\Components\Select::make('variant_id')
                ->label('Product Variant')
                ->options(function (callable $get) {
                    $productId = $get('product_id');
                    if (!$productId) {
                        return [];
                    }
                    return \App\Models\ProductVariant::where('product_id', $productId)
                        ->pluck('variant_name', 'id');
                })
                ->nullable()
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
                ->storeFileNamesIn('images') // Save as JSON in the DB
                ->image() // Restrict to image files
                ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
    
                Tables\Columns\TextColumn::make('user.name') // Assuming a relationship with User
                    ->label('User')
                    ->sortable()
                    ->searchable(),
    
                Tables\Columns\TextColumn::make('product.name') // Assuming a relationship with Product
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
                    ->disk('public') // Ensure storage is set correctly
                    ->limit(3), // Display up to 3 images
                
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
