<?php

namespace App\Filament\Resources\InternmentRecords\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class InternmentRecordInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('transport_association_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('partner_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('partner_name')
                    ->placeholder('-'),
                TextEntry::make('driver_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('driver_name')
                    ->placeholder('-'),
                TextEntry::make('vehicle_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('plate'),
                TextEntry::make('engine_number')
                    ->placeholder('-'),
                TextEntry::make('serial_number')
                    ->placeholder('-'),
                TextEntry::make('model')
                    ->placeholder('-'),
                TextEntry::make('brand')
                    ->placeholder('-'),
                TextEntry::make('vehicle_class')
                    ->placeholder('-'),
                TextEntry::make('color')
                    ->placeholder('-'),
                TextEntry::make('body_type')
                    ->placeholder('-'),
                TextEntry::make('manufacturing_year')
                    ->placeholder('-'),
                TextEntry::make('pnp_ticket')
                    ->placeholder('-'),
                TextEntry::make('infraction_comisaria')
                    ->placeholder('-'),
                TextEntry::make('infraction_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('observation')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
