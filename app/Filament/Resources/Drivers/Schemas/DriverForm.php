<?php

namespace App\Filament\Resources\Drivers\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DriverForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('document_type_id')
                    ->numeric(),
                TextInput::make('document_number')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('license_number')
                    ->required(),
                TextInput::make('license_type')
                    ->required(),
                Select::make('transport_association_id')
                    ->relationship('transportAssociation', 'name'),
            ]);
    }
}
