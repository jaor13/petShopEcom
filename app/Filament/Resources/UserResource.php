<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'User Management';

    protected static ?string $slug = 'user-management-users';




    public static function form(Form $form): Form
    {
        return $form
                ->schema([
            TextInput::make('username')
                ->required()
                ->unique('users', 'username')
                ->maxLength(255),
    
            TextInput::make('fname')
                ->required()
                ->maxLength(255),
    
            TextInput::make('lname')
                ->required()
                ->maxLength(255),
    
            TextInput::make('email')
                ->required()
                ->email()
                ->unique('users', 'email')
                ->maxLength(255),
    
            TextInput::make('password')
                ->password()
                ->dehydrated(fn($state)=>filled($state))
                ->required(fn(Page $livewire):bool => $livewire instanceof CreateRecord)
                ->minLength(8)
                ->maxLength(255),
    
            Select::make('role')
                ->options([
                    'admin' => 'Admin',
                    'user' => 'User',
                ])
                ->default('user')
                ->required(),
    
            Select::make('status')
                ->options([
                    'active' => 'Active',
                    'inactive' => 'Inactive',
                ])
                ->default('active')
                ->required(),
    
            TextInput::make('cp_num')
                ->label('Contact Number')
                ->tel()
                ->nullable(),
    
            FileUpload::make('profile_picture')
                ->directory('profile_pictures')
                ->nullable(),

            
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('username')->sortable()->searchable(),
                TextColumn::make('fname')->sortable()->searchable(),
                TextColumn::make('lname')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                
                BadgeColumn::make('role')
                ->colors([
                    'admin' => 'danger',
                    'user' => 'success',
                ]),

                BadgeColumn::make('status')
                ->colors([
                    'active' => 'success',
                    'inactive' => 'gray',
                ]),
    
                TextColumn::make('cp_num')->label('Contact Number'),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
        
                ImageColumn::make('profile_picture')
                    ->circular()
                    ->label('Profile'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
