<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\OrderResource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Order;

class LatestOrders extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->query(OrderResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
        
                    Tables\Columns\TextColumn::make(name: 'id')
                    ->label('Order ID')
                    ->searchable(),

                    Tables\Columns\TextColumn::make('user_id')
                    ->searchable()
                    ->label('Customer')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn ($state) => \App\Models\User::find($state)?->username ?? 'Unknown'),
                
    
    
                    Tables\Columns\TextColumn::make('grand_total')
                    ->label('Grand Total')
                    ->money('PHP'),
    
                    Tables\Columns\TextColumn::make(name: 'status')
                    ->badge()
                    ->color(fn(string $state) => match ($state) {
                        'new' => 'info',
                        'processing' => 'warning',
                        'shipped' => 'success',
                        'delivered' => 'success',
                        'cancelled' => 'red',
                    })
                    ->icon(fn(string $state) => match ($state) {
                        'new' => 'heroicon-m-spakrles',
                        'processing' => 'heroicon-m-arrow-path',
                        'shipped' => 'heroicon-m-truck',
                        'delivered' => 'heroicon-m-check-badge',
                        'cancelled' => 'heroicon-m-x-circle',
                    })
                    ->label('Status')
                    ->sortable(),
    
                    Tables\Columns\TextColumn::make(name: 'payment_method')
                    ->label('Payment Method')
                    ->sortable()
                    ->searchable(),
    
                    Tables\Columns\TextColumn::make(name: 'payment_status')
                    ->label('Payment Status')
                    ->sortable()
                    ->searchable()
                    ->badge(),
    
                    Tables\Columns\TextColumn::make(name: 'shipping_method')
                    ->label('Shipping Method')
                    ->sortable()
                    ->searchable(),
    
                    Tables\Columns\TextColumn::make(name: 'created_at')
                    ->label('Order Date')
                    ->sortable()
                    ->dateTime(),
    
            ])
            ->actions([
                Tables\Actions\ViewAction::make('View Order')
                ->url(fn(Order $record): string => OrderResource::getUrl('view', ['record' => $record]))
                ->icon('heroicon-m-eye'),
            ]);
    }
}
