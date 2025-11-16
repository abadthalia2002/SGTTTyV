<?php

namespace App\Filament\Resources\InternmentRecords\Pages;

use App\Filament\Resources\InternmentRecords\InternmentRecordResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewInternmentRecord extends ViewRecord
{
    protected static string $resource = InternmentRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
