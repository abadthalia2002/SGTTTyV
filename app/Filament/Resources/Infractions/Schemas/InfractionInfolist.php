<?php

namespace App\Filament\Resources\Infractions\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class InfractionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('code'),
                TextEntry::make('description')
                    ->columnSpanFull(),
                TextEntry::make('type'),
                TextEntry::make('sanction_percentage')
                    ->numeric(),
                TextEntry::make('complementary_measure')
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
