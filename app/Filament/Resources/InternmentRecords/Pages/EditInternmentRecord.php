<?php

namespace App\Filament\Resources\InternmentRecords\Pages;

use App\Filament\Resources\InternmentRecords\InternmentRecordResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditInternmentRecord extends EditRecord
{
    protected static string $resource = InternmentRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
