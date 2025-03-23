<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Filament\Resources\OrderResource\RelationManagers\AddressRelationManager;
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
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Hidden;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use NumberFormatter;
use Filament\Support\Facades\FilamentNumber as Number;
use Filament\Forms\Components\Group;
use App\Filament\Resources\OrderResource\Pages\Invoice;
use Illuminate\Support\Facades\Storage;




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

                        Placeholder::make('order_id')
                        ->label('Order ID')
                        ->content(fn ($record) => $record->id),

                        Placeholder::make('order_date')
                        ->label('Order Date')
                        ->content(fn ($record) => $record->created_at->format('D d Y h:i A')),

                        Select::make('user_id') // Use 'user_id' since it's the actual value being stored
                        ->label('Customer')
                        ->searchable()
                        ->preload()
                        ->options(fn () => \App\Models\User::pluck('username', 'id')) // Fetch users as [id => username]
                        ->getSearchResultsUsing(fn (string $search) => 
                            \App\Models\User::where('username', 'like', "%{$search}%")
                            ->pluck('username', 'id')
                        )
                        ->getOptionLabelUsing(fn ($value) => \App\Models\User::find($value)?->username) // Display username when selected
                        ->required(),
                    

                        Select::make('payment_method')
                        ->options([
                            'cod' => 'Cash on Delivery',
                            'paymongo' => 'Online Payment (Paymongo)',
                        ])
                        ->required(),

                        Select::make('payment_status')
                        ->options([
                            'processing' => 'Processing',
                            'paid' => 'Paid',
                            'failed' => 'Failed',
                            'unpaid' => 'Unpaid',
                            'pending' => 'Pending'
                        ])
                        ->required(),


                        ToggleButtons::make('status')
                        ->inline()
                        ->default('new')
                       ->options([
                        'new' => 'New',
                        'processing'=> 'Processing',
                        'shipped' => 'Shipped',
                        'delivered' => 'Delivered',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled'
                       ])
                       ->colors([
                        'new' => 'info',
                        'processing'=> 'primary',
                        'shipped' => 'success',
                        'delivered' => 'success',
                        'completed' => 'success',
                        'cancelled' => 'warning'
                       ])
                       ->icons([
                        'new' => 'heroicon-m-sparkles',
                        'processing'=> 'heroicon-m-arrow-path',
                        'shipped' => 'heroicon-m-truck',
                        'delivered' => 'heroicon-m-check-circle',
                        'completed' => 'heroicon-m-check-badge',
                        'cancelled' => 'heroicon-m-x-circle'
                       ]),

                       Select::make('shipping_method')
                        ->options([
                            'standard' => 'Standard Delivery',
                        ])
                        ->required(),

                        Textarea::make('notes')
                        ->columnSpanFull(),
                    ])->columns(2),

                    
                    Section::make('Delivery Information')->schema([
                        Group::make()->schema([
                            Placeholder::make('full_name')
                            ->label('Full Name')
                            ->content(fn ($record) => ($record->user->address->first_name ?? 'N/A') . ' ' . ($record->user->address->last_name ?? '')),


                            Placeholder::make('phone')
                                ->label('Phone Number')
                                ->content(fn ($record) => $record->user->address->phone ?? 'N/A'),

                                Placeholder::make('delivery_address')
                                ->label('Delivery Address')
                                ->content(fn ($record) => 
                                    ($record->user->address->street_address ?? 'N/A') . ', ' . 
                                    ($record->user->address->city ?? 'N/A') . ', ' . 
                                    ($record->user->address->zip_code ?? 'N/A') . ', ' . 
                                    ($record->user->address->province ?? 'N/A')
                                ),
                        ])->columns(3),

                    ])->columns(1),


                    Section::make('Order Items')->schema([
                        Repeater::make('items')
                            ->relationship()
                            ->schema([
                                // Product Selection

                                Select::make('product_id')
                                    ->relationship('product', 'product_name')
                                    ->getOptionLabelFromRecordUsing(fn (Product $product) => "{$product->product_name}")
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                    ->columnSpan(4)
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                        $set('variant_id', null); // Reset variant when product changes
                                        $product = Product::find($state);
                                        
                                        if (!$product) {
                                            return;
                                        }
                                    
                                        // If no variants, set unit price from product
                                        if (!\App\Models\ProductVariant::where('product_id', $state)->exists()) {
                                            $set('unit_amount', $product->price);
                                            $set('total_amount', $product->price * $get('quantity', 1));
                                        }
                                    }),
                    
                                // Variant Selection (only visible when product has variants)
                                Select::make('variant_id')
                                    ->label('Variant')
                                    ->options(fn (Get $get) => 
                                        \App\Models\ProductVariant::where('product_id', $get('product_id'))
                                            ->pluck('name', 'id')
                                    )
                                    ->searchable()
                                    ->preload()
                                    ->reactive()
                                    ->columnSpan(4)
                                    ->hidden(fn (Get $get) => 
                                        !\App\Models\ProductVariant::where('product_id', $get('product_id'))->exists()
                                    )
                                    ->disabled(fn (Get $get) => !$get('product_id')) // Disable if no product is selected
                                    ->afterStateUpdated(function($state, Set $set, Get $get) {
                                        $variant = \App\Models\ProductVariant::find($state);
                                        if ($variant) {
                                            $set('unit_amount', $variant->price);
                                            $set('total_amount', $variant->price * $get('quantity', 1));
                                        }
                                    }),

                    
                                // Quantity Input
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
                    
                                // Unit Price
                                TextInput::make('unit_amount')
                                    ->numeric()
                                    ->required()
                                    ->disabled()
                                    ->dehydrated()
                                    ->columnSpan(3),
                    
                                // Total Amount
                                TextInput::make('total_amount')
                                    ->numeric()
                                    ->required()
                                    ->dehydrated()
                                    ->columnSpan(3),

                                    Placeholder::make('image')
                                    ->label('Product Image')
                                    ->content(function (Get $get) {
                                        $product = Product::find($get('product_id'));
                                        $variant = \App\Models\ProductVariant::find($get('variant_id'));
                                
                                        // Check for variant image first
                                        if ($variant && !empty($variant->image)) {
                                            $imagePath = $variant->image;
                                        }
                                        // Check if product images exist and ensure it's an array
                                        elseif ($product && !empty($product->images)) {
                                            $imagePath = is_array($product->images) ? $product->images[0] : $product->images;
                                        } else {
                                            $imagePath = null;
                                        }
                                
                                        // Display image if available
                                        if ($imagePath) {
                                            return new \Illuminate\Support\HtmlString('<img src="' . asset('storage/' . ltrim($imagePath, '/')) . '" alt="Product Image" style="max-width: 100px; max-height: 100px; border: 1px solid #ddd; border-radius: 4px;">');
                                        }
                                
                                        return 'No image available';
                                    })
                                    ->columnSpan(9),
                                
                            ])->columns(12),

                            
                                
                            // Placeholder::make('shipping_amount_placeholder')
                            // ->label('Shipping Fee')
                            // ->content('₱56.00'),
                        
                            // Hidden::make('shipping_amount')
                            //     ->default(56),
                        

                        // // Grand Total Calculation
                        // Placeholder::make('grand_total_placeholder')
                        //     ->label('Grand Total')
                        //     ->content(function(Get $get, Set $set){
                        //         $total = 0;
                        //         if (!$repeaters = $get('items')) {
                        //             return '₱56.00'; // Default to shipping fee if no items
                        //         }
                    
                        //         foreach($repeaters as $key => $repeater){
                        //             $total += $get("items.{$key}.total_amount");
                        //         }

                        //         $total += 56; // Add the fixed shipping amount
                        //         $set('grand_total', $total);
                        //         return '₱' . number_format($total, 2);
                        //     }),
                    
                        // Hidden::make('grand_total')->default(0)
                            Group::make()->schema([
                                
                            Placeholder::make('grand_total_placeholder')
                            ->label('Grand Total')
                            ->content(fn ($record) => '₱' . number_format($record->grand_total, 2)),

                            Placeholder::make('shipping_amount_placeholder')
                            ->label('Shipping Fee')
                            ->content(fn ($record) => '₱' . number_format($record->shipping_amount, 2)),
                        
                            ])->columns(3)
                    ])
                ])                    




















                ]);



    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // TextColumn::make('user_id')
                // ->label('Customer')
                // ->sortable()
                // ->formatStateUsing(fn ($state) => \App\Models\User::find($state)?->username ?? 'Unknown')
                // ->searchable(),
                TextColumn::make('user.username')
                ->label('Customer')
                ->sortable()
                ->searchable()
                ->formatStateUsing(fn ($state) => $state ?? 'Unknown'),


            

                TextColumn::make('grand_total')
                ->numeric()
                ->sortable()
                ->money('PHP'),

                TextColumn::make('payment_method')
                ->sortable()
                ->searchable(),

                TextColumn::make('payment_status')
                ->sortable()
                ->searchable(),

                SelectColumn::make('status')
                ->options([
                    'new' => 'New',
                    'processing'=> 'Processing',
                    'shipped' => 'Shipped',
                    'delivered' => 'Delivered',
                    'completed' => 'Completed',
                    'cancelled' => 'Cancelled'
                ])
                ->sortable()
                ->searchable(),

                TextColumn::make('shipping_method')
                ->sortable()
                ->searchable(),

                TextColumn::make('created_at')
                ->label('Order Date')
                ->sortable()
                ->dateTime('M d, Y h:i A') // 12-hour format with AM/PM
                ->toggledHiddenByDefault(true),
              
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\Action::make("view_invoice")
                        ->label('View Invoice')
                        ->icon('heroicon-o-document-text')
                        ->url(fn($record) => self::getUrl('invoice', ['record' => $record->id]))
                        ->openUrlInNewTab(),
                ])
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

    public static function getNavigationBadge(): ?string{
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string{
        return static::getModel()::count() > 10 ? 'success' : 'danger';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
            'invoice' => Pages\Invoice::route('/{record}/invoice'), // Add this line
        ];
    }
}
