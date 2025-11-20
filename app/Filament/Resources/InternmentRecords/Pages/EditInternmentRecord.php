<?php

namespace App\Filament\Resources\InternmentRecords\Pages;

use App\Filament\Resources\InternmentRecords\InternmentRecordResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Barryvdh\DomPDF\Facade\Pdf;

class EditInternmentRecord extends EditRecord
{
    protected static string $resource = InternmentRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
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
