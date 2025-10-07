<?php

namespace App\Filament\Resources\DocumentTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class DocumentTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required(),
                TextInput::make('abbreviation')
                    ->label('Abreviatura')
                    ->required(),
                Textarea::make('description')
                    ->label('Descripción')
                    ->columnSpanFull(),
                TextInput::make('number_min_length')
                    ->label('Longitud Mínima')
                    ->required()
                    ->numeric(),
                TextInput::make('number_max_length')
                    ->label('Longitud Máxima')  
                    ->required()
                    ->numeric(),
                Textarea::make('number_regex')
                    ->label('Expresión Regular')
                    ->columnSpanFull(),
            ]);
    }
}
