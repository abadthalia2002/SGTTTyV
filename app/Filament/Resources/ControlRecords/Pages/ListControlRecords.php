<?php

namespace App\Filament\Resources\ControlRecords\Pages;

use App\Filament\Resources\ControlRecords\ControlRecordResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListControlRecords extends ListRecords
{
    protected static string $resource = ControlRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
