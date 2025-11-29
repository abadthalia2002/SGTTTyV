<?php

namespace App\Filament\Resources\TransportAssociations\Pages;

use App\Filament\Resources\TransportAssociations\TransportAssociationResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
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
                ->action(function ($record, $livewire) {

                    // Validar cantidad mínima de socios
                    if ($record->partners()->count() < 11) {

                        Notification::make()
                            ->title('No se puede generar el permiso de operación')
                            ->body("La asociación debe tener al menos 11 socios para generar el Permiso de Operación.")
                            ->danger()
                            ->send();

                        return; // 👉 NO CONTINÚA
                    }

                    // Si pasa validación, abrir PDF en nueva pestaña
                    $url = route('pdf.transport-association', ['associationId' => $record->id]);

                    $livewire->js(
                        "window.open('{$url}', '_blank')"
                    );
                })
            /* ->url(
                    fn() => route('pdf.transport-association', ['associationId' => $this->record]),
                    shouldOpenInNewTab: true,

                ) */
        ];
    }
}
