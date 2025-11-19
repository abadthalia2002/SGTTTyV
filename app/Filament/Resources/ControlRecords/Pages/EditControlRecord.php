<?php

namespace App\Filament\Resources\ControlRecords\Pages;

use App\Filament\Resources\ControlRecords\ControlRecordResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditControlRecord extends EditRecord
{
    protected static string $resource = ControlRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
