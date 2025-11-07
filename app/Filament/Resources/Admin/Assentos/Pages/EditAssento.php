<?php

namespace App\Filament\Resources\Admin\Assentos\Pages;

use App\Filament\Resources\Admin\Assentos\AssentoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAssento extends EditRecord
{
    protected static string $resource = AssentoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
