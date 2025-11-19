<?php

namespace App\Filament\Resources\ControlRecords\Pages;

use App\Filament\Resources\ControlRecords\ControlRecordResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewControlRecord extends ViewRecord
{
    protected static string $resource = ControlRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
