<?php

namespace App\Filament\Resources\ControlRecords\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ControlRecordInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('transport_association_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('date')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('time')
                    ->time()
                    ->placeholder('-'),
                TextEntry::make('intervention_place')
                    ->placeholder('-'),
                TextEntry::make('name')
                    ->placeholder('-'),
                TextEntry::make('service_mode')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('vehicle_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('vehicle_authorization_number')
                    ->placeholder('-'),
                TextEntry::make('vehicle_plate'),
                TextEntry::make('route_origin')
                    ->placeholder('-'),
                TextEntry::make('route_destination')
                    ->placeholder('-'),
                TextEntry::make('driver_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('driver_name'),
                TextEntry::make('driver_license_number'),
                TextEntry::make('driver_document_number'),
                TextEntry::make('driver_license_class')
                    ->placeholder('-'),
                TextEntry::make('driver_license_category')
                    ->placeholder('-'),
                TextEntry::make('infraction_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('infraction_code_detected')
                    ->placeholder('-'),
                TextEntry::make('detected_non_compliance_code')
                    ->placeholder('-'),
                TextEntry::make('verification_findings')
                    ->placeholder('-'),
                TextEntry::make('infraction_description_location')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('admin_statement')
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
