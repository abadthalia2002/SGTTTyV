<?php

namespace App\Filament\Resources\TransportAssociations\Pages;

use App\Filament\Resources\TransportAssociations\RelationManagers\DriversRelationManager;
use App\Filament\Resources\TransportAssociations\RelationManagers\PartnersRelationManager;
use App\Filament\Resources\TransportAssociations\TransportAssociationResource;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;

class ViewTransportAssociation extends ViewRecord
{
    protected static string $resource = TransportAssociationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('Generar PDF')
                ->label('Generar Permiso de Operación')
                ->requiresConfirmation()
                /* ->url(
                    fn() => route('pdf.transport-association', ['associationId' => $this->record]),
                    shouldOpenInNewTab: true,

                ) */
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
        ];
    }

    protected function getRelationManager(): array
    {
        return [
            PartnersRelationManager::class,
            DriversRelationManager::class,
        ];
    }
}
