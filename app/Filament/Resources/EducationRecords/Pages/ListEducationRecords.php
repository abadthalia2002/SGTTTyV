<?php

namespace App\Filament\Resources\EducationRecords\Pages;

use App\Filament\Resources\EducationRecords\EducationRecordResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEducationRecords extends ListRecords
{
    protected static string $resource = EducationRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
