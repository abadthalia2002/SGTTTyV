<?php

namespace App\Filament\Resources\EducationRecords\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class EducationRecordInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('date')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('time')
                    ->time()
                    ->placeholder('-'),
                TextEntry::make('location')
                    ->placeholder('-'),
                TextEntry::make('transport_association_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('driver_id')
                    ->placeholder('-'),
                TextEntry::make('driver_name')
                    ->placeholder('-'),
                TextEntry::make('driver_address')
                    ->placeholder('-'),
                TextEntry::make('driver_document_number')
                    ->placeholder('-'),
                TextEntry::make('license_class')
                    ->placeholder('-'),
                TextEntry::make('license_number')
                    ->placeholder('-'),
                TextEntry::make('vehicle_plate')
                    ->placeholder('-'),
                TextEntry::make('engine_number')
                    ->placeholder('-'),
                TextEntry::make('vehicle_class')
                    ->placeholder('-'),
                TextEntry::make('vehicle_brand')
                    ->placeholder('-'),
                TextEntry::make('vehicle_registration_number')
                    ->placeholder('-'),
                TextEntry::make('vehicle_color')
                    ->placeholder('-'),
                TextEntry::make('registration_date')
                    ->placeholder('-'),
                TextEntry::make('partner_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('partner_name')
                    ->placeholder('-'),
                TextEntry::make('partner_address')
                    ->placeholder('-'),
                TextEntry::make('partner_document_number')
                    ->placeholder('-'),
                IconEntry::make('law_27181')
                    ->boolean(),
                IconEntry::make('law_27189')
                    ->boolean(),
                IconEntry::make('ds_017_09_mtc')
                    ->boolean(),
                IconEntry::make('ds_055_10_mtc')
                    ->boolean(),
                TextEntry::make('om_number_1')
                    ->placeholder('-'),
                TextEntry::make('om_number_2')
                    ->placeholder('-'),
                TextEntry::make('additional_information')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('driver_observations')
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
