<?php

namespace App\Filament\Resources\Admin\Salas;

use App\Filament\Resources\Admin\Salas\Pages\CreateSala;
use App\Filament\Resources\Admin\Salas\Pages\EditSala;
use App\Filament\Resources\Admin\Salas\Pages\ListSalas;
use App\Filament\Resources\Admin\Salas\Schemas\SalaForm;
use App\Filament\Resources\Admin\Salas\Tables\SalasTable;
use App\Models\Admin\Sala;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SalaResource extends Resource
{
    protected static ?string $model = Sala::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nome';

    public static function form(Schema $schema): Schema
    {
        return SalaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SalasTable::configure($table);
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
            'index' => ListSalas::route('/'),
            'create' => CreateSala::route('/create'),
            'edit' => EditSala::route('/{record}/edit'),
        ];
    }
}
