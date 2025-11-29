<?php

namespace App\Filament\Resources\TransportAssociations\Pages;

use App\Filament\Resources\TransportAssociations\RelationManagers\DriversRelationManager;
use App\Filament\Resources\TransportAssociations\RelationManagers\PartnersRelationManager;
use App\Filament\Resources\TransportAssociations\TransportAssociationResource;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
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
                ->label('Generar Permiso de Operaicón')
                ->requiresConfirmation()
                ->url(
                    fn() => route('pdf.transport-association', ['associationId' => $this->record]),
                    shouldOpenInNewTab: true,

                )
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
