<?php

namespace App\Filament\Resources\DocumentTypes\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class DocumentTypeInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label('Nombre'),
                TextEntry::make('abbreviation')
                    ->label('Abreviatura'),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->label('Descripción')
                    ->columnSpanFull(),
                TextEntry::make('number_min_length')
                    ->numeric()
                    ->label('Longitud Mínima'),
                TextEntry::make('number_max_length')
                    ->numeric()
                    ->label('Longitud Máxima'),
                TextEntry::make('number_regex')
                    ->placeholder('-')
                    ->label('Expresión Regular')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->label('Creado el')
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->label('Actualizado el')
                    ->placeholder('-'),
            ]);
    }
}
