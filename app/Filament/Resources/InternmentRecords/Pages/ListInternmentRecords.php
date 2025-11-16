<?php

namespace App\Filament\Resources\InternmentRecords\Pages;

use App\Filament\Resources\InternmentRecords\InternmentRecordResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListInternmentRecords extends ListRecords
{
    protected static string $resource = InternmentRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
