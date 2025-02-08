<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BarangResource\Pages;
use App\Filament\Resources\BarangResource\RelationManagers;
use App\Models\Barang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BarangResource extends Resource
{
    protected static ?string $model = Barang::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationLabel = 'Data Barang';

    protected static ?string $slug = 'data-barang';

    public static function getModelLabel(): string
    {
        return 'Kelola Data Barang';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Kelola Data Barang';
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_barang')
                    ->label('Nama Barang')
                    ->required(),
                TextInput::make('kode_barang')
                    ->label('Kode Barang')
                    ->required(),
                TextInput::make('harga_barang')
                    ->label('Harga Barang')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_barang')
                    ->label('Nama Barang')
                    ->placeholder('Masukkan Nama Barang')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('kode_barang')
                    ->label('Kode Barang')
                    ->placeholder('Masukkan Kode Barang')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('harga_barang')
                    ->label('Harga Barang')
                    ->placeholder('Masukkan Harga Barang')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListBarangs::route('/'),
            'create' => Pages\CreateBarang::route('/create'),
            'edit' => Pages\EditBarang::route('/{record}/edit'),
        ];
    }
}
