<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('document_number')->label('Número de Documento'),
                TextEntry::make('name')->label('Nombres y Apellidos'),
                TextEntry::make('email')
                    ->label('Email'),
                TextEntry::make('email_verified_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('address')
                    ->label('Dirección')
                    ->placeholder('-'),
                TextEntry::make('phone')
                    ->label('Teléfono') 
                    ->placeholder('-'),
                ImageEntry::make('image')
                    ->label('Foto')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->label('Fecha de Creación')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label('Fecha de Actualización')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
