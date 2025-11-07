<?php

namespace App\Filament\Resources\Admin\Salas\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SalaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('cinema_id')
                    ->relationship('cinema', 'id')
                    ->required(),
                TextInput::make('nome')
                    ->required(),
                TextInput::make('capacidade')
                    ->required()
                    ->numeric(),
                TextInput::make('tipo')
                    ->required(),
                Toggle::make('disponivel')
                    ->required(),
            ]);
    }
}
