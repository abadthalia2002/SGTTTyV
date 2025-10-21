<?php

namespace App\Filament\Resources\Vehicles\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class VehicleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('plate')
                 ->label('Número de Placa'),
                TextEntry::make('brand')
                 ->label('Marca'),
                TextEntry::make('model')
                 ->label('Modelo'),
                TextEntry::make('type')
                 ->label('Tipo de Vehículo'),
                TextEntry::make('partner.name')
                    ->label('Propietario')
                    ->placeholder('-'),
                TextEntry::make('driver.name')
                    ->label('Conductor')
                    ->placeholder('-'),
                TextEntry::make('transportAssociation.name')
                    ->label('Asociación de Transporte'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
