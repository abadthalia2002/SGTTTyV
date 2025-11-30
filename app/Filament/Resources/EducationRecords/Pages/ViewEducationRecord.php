<?php

namespace App\Filament\Resources\EducationRecords\Pages;

use App\Filament\Resources\EducationRecords\EducationRecordResource;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewEducationRecord extends ViewRecord
{
    protected static string $resource = EducationRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('Generar Acta de Educación')
                ->label('Generar Acta de Educación')
                ->requiresConfirmation()
                ->url(
                    fn() => route('pdf.education-record', ['educationRecordId' => $this->record]),
                    shouldOpenInNewTab: true
                )
        ];
    }
}
