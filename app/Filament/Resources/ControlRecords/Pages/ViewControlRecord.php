<?php

namespace App\Filament\Resources\ControlRecords\Pages;

use App\Filament\Resources\ControlRecords\ControlRecordResource;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewControlRecord extends ViewRecord
{
    protected static string $resource = ControlRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('Generar Acta de Control')
                ->label('Generar Acta de Control')
                ->requiresConfirmation()
                ->url(
                    fn() => route('pdf.control-record', ['controlRecordId' => $this->record]),
                    shouldOpenInNewTab: true
                )

        ];
    }
}
