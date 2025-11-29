<?php

namespace App\Filament\Resources\TransportAssociations\Pages;

use App\Filament\Resources\TransportAssociations\TransportAssociationResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTransportAssociation extends EditRecord
{
    protected static string $resource = TransportAssociationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
           /*  DeleteAction::make(), */
            Action::make('Generar PDF')
                ->label('Generar Permiso de Operaicón')
                ->requiresConfirmation()
                ->url(
                    fn() => route('pdf.transport-association', ['associationId' => $this->record]),
                    shouldOpenInNewTab: true,

                )
        ];
    }
}
