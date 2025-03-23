<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Tables\Filters\SelectFilter;
use App\Models\ProductVariant;
use App\Models\Stock;
use App\Filament\Resources\RelationManagers\StocksRelationManager;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $label = 'Product Listing & Stock'; 

    protected static ?string $navigationGroup = 'Product Management';

    protected static ?string $slug = 'product-management-products';

    protected static ?string $recordTitleAttribute = 'product_name';




    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Group::make()->schema([
                    Section::make('Product Information')->schema([

                        TextInput::make('product_name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (string $operation, $state, callable $set) {
                                if ($operation !== 'create') {
                                    return;
                                }
                                $set('slug', Str::slug($state));
                            }),
    
                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->disabled()
                            ->dehydrated()
                            ->unique(Product::class, 'slug', ignoreRecord: true),
    
                        MarkdownEditor::make('description')
                            ->required()
                            ->columnSpanFull()
                            ->fileAttachmentsDirectory('products'),

                    ])->columns(2),
    
                    Section::make('Images')->schema([
                        FileUpload::make('images')
                            ->multiple()
                            ->directory('products')
                            ->image()
                            ->maxFiles(5)
                            ->reorderable(),
                    ]),

                ])->columnSpan(2),

    
                Group::make()->schema([
                    Section::make('Pricing')->schema([

                        TextInput::make('price')
                            ->numeric()
                            ->prefix('Php')
                            ->required(fn (callable $get) => !$get('has_variant')) 
                            ->disabled(fn (callable $get) => $get('has_variant')),



                            
                            // TextInput::make('stock_quantity')
                            // ->label('Stock')
                            // ->numeric()
                            // ->default(fn ($record) => $record?->has_variant ? null : $record?->stock_quantity ?? 0)
                            // ->dehydrateStateUsing(fn ($state, $record) => !$record?->has_variant ? $state : null) // Only save if not variant-based
                            // ->required(fn (callable $get) => !$get('has_variant'))
                            // ->disabled(fn (callable $get) => $get('has_variant')),
                        
                        

                            TextInput::make('stock_quantity')
                            ->label('Stock')
                            ->numeric()
                            ->required(fn (callable $get) => !$get('has_variant'))
                            ->disabled(fn (callable $get) => $get('has_variant'))
                            ->afterStateUpdated(function (callable $get, $state) {
                                if (!$get('has_variant')) {
                                    Product::where('id', $get('id'))->update(['stock_quantity' => $state]);
                                }
                            }),
                        
                    ]),

    
                    Section::make('Association')->schema([
                        MultiSelect::make('categories')
                            ->relationship('categories', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                    ]),
                ])->columnSpan(1),
    

                Section::make('Product Status')->schema([
                    Toggle::make('has_variant')
                    ->label('Has Variants')
                    ->default(false)
                    ->reactive()
                    ->afterStateUpdated(function (callable $get, callable $set, ?bool $state) {
                        $productId = $get('id');

                        if (!$productId) {
                            return;
                        }

                        if (!$state) { // If `has_variant` is turned OFF
                            ProductVariant::where('product_id', $productId)->delete(); // Delete all variants
                            
                            // Restore stock_quantity from the product itself
                            $totalStock = Product::where('id', $productId)->value('stock_quantity');
                            $set('stock_quantity', $totalStock ?? 0);
                        }
                    }),

                    
                    Forms\Components\Repeater::make('variants')
                        ->relationship('variants')
                        ->schema([
                            TextInput::make('name')
                                ->label('Variant Name')
                                ->required(),
                            
                                TextInput::make('stock_quantity')
                                ->label('Stock')
                                ->numeric()
                                ->default(fn ($record) => $record?->stock_quantity)
                                ->required(), // Stock is required for each variant

                                
                             
                            
                            TextInput::make('price')
                                ->numeric()
                                ->required(), 

                                Section::make('Image')->schema([
                                    FileUpload::make('image')
                                        ->directory('products/variants')
                                        ->image()
                                ]),
                        ])
                        ->columnSpanFull()
                        ->hidden(fn (callable $get) => !$get('has_variant')), // Show only if has_variant is true
                            
                    Toggle::make('is_active')
                        ->required()
                        ->default(true),
                ])->columnSpanFull(),
            ])->columns(3);
    }
    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product_name')
                ->searchable(),

                Tables\Columns\ImageColumn::make('images')
                ->label('Image'),

                Tables\Columns\TagsColumn::make('categories.name')
                ->sortable(),

                Tables\Columns\TextColumn::make('price')
                    ->money('PHP')
                    ->sortable()
                    ->getStateUsing(fn (Product $record) => $record->price),

                // Tables\Columns\IconColumn::make('is_active')
                //     ->boolean()
                //     ->sortable(),

                Tables\Columns\TextColumn::make('sold_count')
                    ->label('Number of Sold')
                    ->sortable()
                    // ->getStateUsing(fn (Product $record) => $record->has_variant 
                    //     ? $record->variants->sum('sold_count') 
                    //     : $record->sold_count
                    // ),
                    ->getStateUsing(fn (Product $record) => $record->sold_count),


               Tables\Columns\TextColumn::make('stock_quantity')
                ->numeric()
                ->sortable()
                // ->getStateUsing(fn (Product $record) => $record->has_variant 
                //     ? $record->variants->sum('stock_quantity') 
                //     : $record->stock_quantity
                ->getStateUsing(fn (Product $record) => $record->stock_quantity),
            

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
                SelectFilter::make('categories')
                    ->relationship('categories', 'name')
                    ->searchable()
                    ->label('Category'),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
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
        ];
    }
    

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

}
