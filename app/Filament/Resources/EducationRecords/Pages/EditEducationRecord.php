<?php

namespace App\Filament\Resources\EducationRecords\Pages;

use App\Filament\Resources\EducationRecords\EducationRecordResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditEducationRecord extends EditRecord
{
    protected static string $resource = EducationRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
