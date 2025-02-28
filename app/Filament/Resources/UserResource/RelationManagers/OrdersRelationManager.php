<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use App\Filament\Resources\OrderResource;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions;
use Filament\Tables\Actions\Action;

class OrdersRelationManager extends RelationManager
{
    protected static string $relationship = 'orders';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\TextInput::make('id')
                //     ->required()
                //     ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
        
                Tables\Columns\TextColumn::make(name: 'id')
                ->label('Order ID')
                ->searchable(),

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
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(), hides the create button
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Action::make('View Order')
                    ->icon('heroicon-m-eye')
                    ->url(fn($record) => OrderResource::getUrl('view', ['record' => $record]))
                    ->color('info'),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
