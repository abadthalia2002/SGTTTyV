<?php

namespace App\Filament\Resources\Drivers\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class DriverInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('document_type_id')
                    ->label('Tipo de Documento')    
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('document_number')
                    ->label('Número de Documento')
                    ->placeholder('-'),
                TextEntry::make('name')
                    ->label('Nombres y Apellidos')
                    ->placeholder('-'),
                TextEntry::make('license_number')
                    ->label('Número de Licencia')
                    ->placeholder('-'),
                TextEntry::make('license_type')
                    ->label('Tipo de Licencia')
                    ->placeholder('-'),
                TextEntry::make('transportAssociation.name')
                    ->label('Asociación de Transporte')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
