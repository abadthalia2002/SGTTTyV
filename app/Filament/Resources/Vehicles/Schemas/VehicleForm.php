<?php

namespace App\Filament\Resources\Vehicles\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class VehicleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('plate')
                    ->label('Número de Placa')
                    ->required(),
                TextInput::make('brand')
                    ->label('Marca')
                    ->required(),
                TextInput::make('model')
                    ->label('Modelo')
                    ->required(),
                TextInput::make('type')
                    ->label('Tipo de Vehículo')
                    ->required(),
                Select::make('partner_id')
                    ->label('Propietario')
                    ->searchable()
                    ->native(false)
                    ->relationship('partner', 'name'),
                Select::make('driver_id')
                    ->label('Conductor')
                    ->searchable()
                    ->native(false)
                    ->relationship('driver', 'name'),
               Select::make('transport_association_id')
                    ->label('Asociación de Transporte')
                    ->native(false)
                    ->relationship('transportAssociation', 'name'),
            ]);
    }
}
