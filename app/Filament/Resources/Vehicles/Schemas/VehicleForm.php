<?php

namespace App\Filament\Resources\Vehicles\Schemas;

use App\Models\Driver;
use App\Models\Partner;
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
                Select::make('transport_association_id')
                    ->label('Asociación de Transporte')
                    ->relationship('transportAssociation', 'name')
                    ->required()
                    ->native(false)
                    ->searchable()
                    ->preload()
                    ->reactive(),


                Select::make('partner_id')
                    ->label('Propietario (Socio)')
                    ->options(function (callable $get) {
                        $associationId = $get('transport_association_id');

                        if (!$associationId) {
                            return [];
                        }

                        return Partner::where('transport_association_id', $associationId)
                            ->pluck('name', 'id');
                    })
                    ->required()
                    ->disabled(fn(callable $get) => !$get('transport_association_id'))
                    ->native(false)
                    ->searchable()
                    ->preload()
                    ->reactive(),


                Select::make('driver_id')
                    ->label('Conductor')
                    ->options(function (callable $get) {
                        $associationId = $get('transport_association_id');

                        if (!$associationId) {
                            return [];
                        }

                        return Driver::where('transport_association_id', $associationId)
                            ->pluck('name', 'id');
                    })
                    ->required()
                    ->disabled(fn(callable $get) => !$get('transport_association_id'))
                    ->native(false)
                    ->searchable()
                    ->preload()
                    ->reactive(),
            ]);
    }
}
