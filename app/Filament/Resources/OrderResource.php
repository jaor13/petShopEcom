<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Concerns\CanDisableOptionsWhenSelectedInSiblingRepeaterItems;
use Filament\Forms\Set;
use Filament\Forms\Get;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Order Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->columnSpanFull()->schema([
                    Section::make('Order Information')->schema([
                       Select::make('user_id')
                        ->label('Customer')
                        ->options(fn () => \App\Models\User::get()
                        ->mapWithKeys(fn ($user) => [$user->id => $user->full_name]))                        
                        ->searchable()
                        ->preload()
                        ->required(),

                        Select::make('payment_method')
                        ->options([
                            'gcash' => 'GCash',
                            'cod' => 'Cash on Delivery'
                        ])
                        ->required(),

                        Select::make('payment_status')
                        ->options([
                            'pending' => 'Pending',
                            'paid' => 'Paid',
                            'failed' => 'Failed'
                        ])
                        ->default('pending')
                        ->required(),


                        ToggleButtons::make('status')
                        ->inline()
                        ->default('new')
                       ->options([
                        'new' => 'New',
                        'processing'=> 'Processing',
                        'shipped' => 'Shipped',
                        'delivered' => 'Delivered',
                        'cancelled' => 'Cancelled'
                       ])
                       ->colors([
                        'new' => 'info',
                        'processing'=> 'warning',
                        'shipped' => 'success',
                        'delivered' => 'success',
                        'cancelled' => 'warning'
                       ])
                       ->icons([
                        'new' => 'heroicon-m-sparkles',
                        'processing'=> 'heroicon-m-arrow-path',
                        'shipped' => 'heroicon-m-truck',
                        'delivered' => 'heroicon-m-check-badge',
                        'cancelled' => 'heroicon-m-x-circle'
                       ]),

                       Select::make('shipping_method')
                        ->options([
                            'pickup' => 'Pickup',
                            'delivery' => 'Delivery'
                        ])
                        ->required(),

                        Textarea::make('notes')
                        ->columnSpanFull()
                        ->required(),
                    ])->columns(2),

                        Section::make('Order Items')->schema([
                            Repeater::make('items')
                            ->relationship()
                            ->schema([
                                Select::make('product_id')
                                ->relationship('product', 'product_name')
                                ->searchable()
                                ->preload()
                                ->required()
                                ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                ->columnSpan(4)
                                ->reactive()
                                ->afterStateUpdated(fn($state, Set $set) => 
                                    $set('unit_amount', optional(Product::find($state))->price)
                            )
                            ->afterStateUpdated(fn($state, Set $set) => 
                            $set('total_amount', optional(Product::find($state))->price),
                    ),
                    
                            
                    TextInput::make('quantity')
                    ->numeric()
                    ->required()
                    ->default(1)
                    ->minValue(1)
                    ->columnSpan(2)
                    ->reactive()
                    ->afterStateUpdated(fn($state, Set $set, Get $get) => 
                        $set('total_amount', $get('unit_amount') * $state)
                    ),
                

                                TextInput::make('unit_amount')
                                ->numeric() 
                                ->required()
                                ->disabled()
                                ->dehydrated()
                                ->columnSpan(3),

                                TextInput::make('total_amount')
                                ->numeric()
                                ->required()
                                ->dehydrated()
                                ->columnSpan(3),

                            ])->columns(12),
                        ])


                    ]),
                ])
                ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
