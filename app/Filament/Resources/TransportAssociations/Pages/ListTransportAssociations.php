<?php

namespace App\Filament\Resources\TransportAssociations\Pages;

use App\Filament\Resources\TransportAssociations\TransportAssociationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTransportAssociations extends ListRecords
{
    protected static string $resource = TransportAssociationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
