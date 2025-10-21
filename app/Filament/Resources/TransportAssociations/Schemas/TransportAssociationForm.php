<?php

namespace App\Filament\Resources\TransportAssociations\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TransportAssociationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('document_number')
                    ->label('Número de Documento')
                    ->required(),
                TextInput::make('name')
                    ->label('Nombre de la Asociación')
                    ->required(),
                Textarea::make('description')
                    ->label('Descripción')
                    ->columnSpanFull(),
                Textarea::make('location')
                    ->label('Dirección')
                    ->columnSpanFull(),
                Select::make('partner_id')
                    ->label('Presidente de la Asociación')
                    ->relationship('partner', 'name')
                    ->required()
            ]);
    }
}
