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
                    ->required(),
                TextInput::make('brand')
                    ->required(),
                TextInput::make('model')
                    ->required(),
                TextInput::make('type')
                    ->required(),
                Select::make('partner_id')
                    ->relationship('partner', 'name'),
                Select::make('driver_id')
                    ->relationship('driver', 'name'),
                Select::make('transport_association_id')
                    ->relationship('transportAssociation', 'name')
                    ->required(),
            ]);
    }
}
