<?php

namespace App\Filament\Resources\Admin\Assentos\Pages;

use App\Filament\Resources\Admin\Assentos\AssentoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAssentos extends ListRecords
{
    protected static string $resource = AssentoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
