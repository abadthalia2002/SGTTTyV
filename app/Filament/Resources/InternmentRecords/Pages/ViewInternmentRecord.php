<?php

namespace App\Filament\Resources\InternmentRecords\Pages;

use App\Filament\Resources\InternmentRecords\InternmentRecordResource;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewInternmentRecord extends ViewRecord
{
    protected static string $resource = InternmentRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('Generar PDF')
                ->label('Generar PDF')
                ->requiresConfirmation()
                ->url(
                    fn() => route('pdf.example', ['internmentRecordId' => $this->record]),
                    shouldOpenInNewTab: true,

                )
        ];
    }
}
