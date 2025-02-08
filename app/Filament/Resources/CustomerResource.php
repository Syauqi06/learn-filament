<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Kelola Customer';

    protected static ?string $navigationGroup = 'Kelola Data';

    protected static ?string $slug = 'kelola-customer';

    public static function getModelLabel(): string
    {
        return 'Kelola Customer';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Kelola Customer';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_customer')
                    ->label('Nama')
                    ->placeholder('Masukkan Nama Customer')
                    ->required(),
                TextInput::make('kode_customer')
                    ->label('Kode')
                    ->placeholder('Masukkan Kode Customer')
                    ->numeric()
                    ->required(),
                TextInput::make('alamat_customer')
                    ->label('Alamat')
                    ->placeholder('Masukkan Alamat Customer')
                    ->required(),
                TextInput::make('no_customer')
                    ->label('Telepon')
                    ->numeric()
                    ->placeholder('Masukkan Nomor Telepon Customer')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_customer')
                    ->searchable()
                    ->label('Nama'),
                TextColumn::make('kode_customer')
                    ->sortable()
                    ->label('Kode'),
                TextColumn::make('alamat_customer')
                    ->copyable()
                    ->label('Alamat'),
                TextColumn::make('no_customer')
                    ->copyable()
                    ->label('Telepon'),
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
