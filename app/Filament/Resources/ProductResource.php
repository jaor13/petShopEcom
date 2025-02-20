<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Set;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use File;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Product Information')->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (string $operation, $state, callable $set)  {
                                if($operation !== 'create') {
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
                            ->fileAttachmentsDirectory('products')
                    ])->columns(2),

                    Section::make('Images')->schema([
                        FileUpload::make('images')
                            ->multiple()
                            ->directory('products')
                            ->image()
                            ->maxFiles(5)
                            ->reorderable(),
                    ]) 

                    ])->columnSpan(2),


                    Group::make()->schema([
                        Section::make('Pricing')->schema([
                            TextInput::make('price')
                                ->required()
                                ->numeric()
                                ->prefix('Php'),
                        ]),


                        Section::make('Association')->schema([
                            MultiSelect::make('categories')
                                ->relationship('categories', 'name')
                                ->searchable()
                                ->preload()
                                ->required(),
                        ]),
                        
                        Section::make('Status')->schema([
                            Toggle::make('in_stock')
                                ->required()
                                ->default(true),

                            Toggle::make('is_active')
                                ->required()
                                ->default(true),
                        ]),


                    ])->columnSpan(1),




                // Forms\Components\TextInput::make('category_id')
                //     ->required()
                //     ->numeric(),
                // Forms\Components\TextInput::make('product_name')
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\TextInput::make('slug')
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\Textarea::make('images')
                //     ->columnSpanFull(),
                // Forms\Components\Textarea::make('description')
                //     ->columnSpanFull(),
                // Forms\Components\TextInput::make('price')
                //     ->required()
                //     ->numeric()
                //     ->prefix('$'),
                // Forms\Components\Toggle::make('is_active')
                //     ->required(),
                // Forms\Components\Toggle::make('in_stock')
                //     ->required(),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('product_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\IconColumn::make('in_stock')
                    ->boolean(),
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
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
