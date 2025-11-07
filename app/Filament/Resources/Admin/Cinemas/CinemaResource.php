<?php

namespace App\Filament\Resources\Admin\Cinemas;

use App\Filament\Resources\Admin\Cinemas\Pages\CreateCinema;
use App\Filament\Resources\Admin\Cinemas\Pages\EditCinema;
use App\Filament\Resources\Admin\Cinemas\Pages\ListCinemas;
use App\Filament\Resources\Admin\Cinemas\RelationManagers\SalasRelationManager;
use App\Filament\Resources\Admin\Cinemas\Schemas\CinemaForm;
use App\Filament\Resources\Admin\Cinemas\Tables\CinemasTable;
use App\Models\Admin\Cinema;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CinemaResource extends Resource
{
    protected static ?string $model = Cinema::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nome';

    public static function form(Schema $schema): Schema
    {
        return CinemaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CinemasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            SalasRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCinemas::route('/'),
            'create' => CreateCinema::route('/create'),
            'edit' => EditCinema::route('/{record}/edit'),
        ];
    }
}
