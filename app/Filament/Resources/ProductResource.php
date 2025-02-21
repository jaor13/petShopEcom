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
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Tables\Filters\SelectFilter;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Main Product Details
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
    
                // Pricing & Category Section
                Group::make()->schema([
                    Section::make('Pricing')->schema([
                        TextInput::make('price')
                            ->numeric()
                            ->prefix('Php')
                            ->required()
                            ->disabled(fn (callable $get) => $get('has_variant')),
    
                        TextInput::make('stock_quantity')
                            ->numeric()
                            ->required(fn (callable $get) => !$get('has_variant'))
                            ->disabled(fn (callable $get) => $get('has_variant')),
                    ]),
    
                    Section::make('Association')->schema([
                        MultiSelect::make('categories')
                            ->relationship('categories', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                    ]),
                ])->columnSpan(1),
    
                // Product Status Section
                Section::make('Product Status')->schema([
                    Toggle::make('has_variant')
                        ->label('Has Variants')
                        ->default(false)
                        ->reactive(),

                    Forms\Components\Repeater::make('variants')
                        ->relationship('variants')
                        ->schema([
                            TextInput::make('name')->label('Variant Name')->required(),
                            
                            TextInput::make('stock_quantity')
                                ->label('Stock')
                                ->numeric()
                                ->required()
                                ->default(fn ($record) => $record->stocks()->sum('stock_quantity')),

                            



                                
                            TextInput::make('price')->numeric()->nullable(),
                        ])
                        ->columnSpanFull()
                        ->hidden(fn (callable $get) => !$get('has_variant')),
    
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

                Tables\Columns\TagsColumn::make('categories.name')
                ->sortable(),

                Tables\Columns\TextColumn::make('price')
                    ->money('PHP')
                    ->sortable()
                    ->getStateUsing(fn (Product $record) => $record->price),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('stock')
                    ->numeric()
                    ->getStateUsing(fn (Product $record) => $record->stock),

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
            //
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
