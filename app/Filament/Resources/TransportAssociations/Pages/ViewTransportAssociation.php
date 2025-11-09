<?php

namespace App\Filament\Resources\TransportAssociations\Pages;

use App\Filament\Resources\TransportAssociations\RelationManagers\DriversRelationManager;
use App\Filament\Resources\TransportAssociations\RelationManagers\PartnersRelationManager;
use App\Filament\Resources\TransportAssociations\TransportAssociationResource;
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
        ];
    }

    protected function getRelationManager (): array
    {
        return [
            PartnersRelationManager::class,
            DriversRelationManager::class,
        ];
    }


    /* protected function getInfolist(): array
    {
        return [
            Tabs::make('Details')
                ->tabs([
                    Tab::make('Socios')
                        ->schema([
                            RepeatableEntry::make('partners')
                                ->schema([
                                    TextEntry::make('name')->label('Nombre'),
                                    TextEntry::make('documentType.abbreviation')->label('Tipo Doc.'),
                                    TextEntry::make('document_number')->label('N° Documento'),
                                ]),
                        ]),
                    Tab::make('Conductores')
                        ->schema([
                            RepeatableEntry::make('drivers')
                                ->schema([
                                    TextEntry::make('name')->label('Nombre'),
                                    TextEntry::make('license_number')->label('Licencia'),
                                    TextEntry::make('license_type')->label('Tipo'),
                                ]),
                        ]),
                ]),
        ];
    } */
}
