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
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('document_number'),
                TextEntry::make('name'),
                TextEntry::make('license_number'),
                TextEntry::make('license_type'),
                TextEntry::make('transportAssociation.name')
                    ->label('Transport association')
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
