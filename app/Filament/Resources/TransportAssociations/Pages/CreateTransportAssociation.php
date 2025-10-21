<?php

namespace App\Filament\Resources\TransportAssociations\Pages;

use App\Filament\Resources\TransportAssociations\TransportAssociationResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTransportAssociation extends CreateRecord
{
    protected static string $resource = TransportAssociationResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        if ($this->record->partner_id) {
            $partner = $this->record->partner;
            $partner->transport_association_id = $this->record->id;
            $partner->save();
        }
    }
}
