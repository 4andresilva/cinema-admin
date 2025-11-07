<?php

namespace App\Filament\Resources\Admin\Assentos;

use App\Filament\Resources\Admin\Assentos\Pages\CreateAssento;
use App\Filament\Resources\Admin\Assentos\Pages\EditAssento;
use App\Filament\Resources\Admin\Assentos\Pages\ListAssentos;
use App\Filament\Resources\Admin\Assentos\Schemas\AssentoForm;
use App\Filament\Resources\Admin\Assentos\Tables\AssentosTable;
use App\Models\Admin\Assento;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AssentoResource extends Resource
{
    protected static ?string $model = Assento::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'numero';

    public static function form(Schema $schema): Schema
    {
        return AssentoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AssentosTable::configure($table);
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
            'index' => ListAssentos::route('/'),
            'create' => CreateAssento::route('/create'),
            'edit' => EditAssento::route('/{record}/edit'),
        ];
    }
}
