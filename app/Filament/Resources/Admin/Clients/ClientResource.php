<?php

namespace App\Filament\Resources\Admin\Clients;

use App\Filament\Resources\Admin\Clients\Pages\CreateClient;
use App\Filament\Resources\Admin\Clients\Pages\EditClient;
use App\Filament\Resources\Admin\Clients\Pages\ListClients;
use App\Filament\Resources\Admin\Clients\Schemas\ClientForm;
use App\Filament\Resources\Admin\Clients\Tables\ClientsTable;
use App\Models\Admin\Client;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nome';

    public static function form(Schema $schema): Schema
    {
        return ClientForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ClientsTable::configure($table);
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
            'index' => ListClients::route('/'),
            'create' => CreateClient::route('/create'),
            'edit' => EditClient::route('/{record}/edit'),
        ];
    }
}
