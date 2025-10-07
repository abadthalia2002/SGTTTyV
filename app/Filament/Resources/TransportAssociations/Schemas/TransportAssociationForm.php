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
                    ->required(),
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                Textarea::make('location')
                    ->columnSpanFull(),
                Select::make('partner_id')
                    ->relationship('partner', 'name')
                    ->required()
            ]);
    }
}
