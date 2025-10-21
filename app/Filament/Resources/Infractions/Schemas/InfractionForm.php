<?php

namespace App\Filament\Resources\Infractions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class InfractionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('type')
                    ->required(),
                TextInput::make('sanction_percentage')
                    ->required()
                    ->numeric(),
                TextInput::make('complementary_measure'),
            ]);
    }
}
