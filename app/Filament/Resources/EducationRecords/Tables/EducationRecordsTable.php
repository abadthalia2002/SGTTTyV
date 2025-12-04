<?php

namespace App\Filament\Resources\EducationRecords\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class EducationRecordsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('date')
                    ->date()
                    ->sortable(),
                TextColumn::make('time')
                    ->time()
                    ->sortable(),
                TextColumn::make('location')
                    ->searchable(),
                TextColumn::make('transport_association_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('driver_id')
                    ->searchable(),
                TextColumn::make('driver_name')
                    ->searchable(),
                TextColumn::make('driver_address')
                    ->searchable(),
                TextColumn::make('driver_document_number')
                    ->searchable(),
                TextColumn::make('license_class')
                    ->searchable(),
                TextColumn::make('license_number')
                    ->searchable(),
                TextColumn::make('vehicle_plate')
                    ->searchable(),
                TextColumn::make('engine_number')
                    ->searchable(),
                TextColumn::make('vehicle_class')
                    ->searchable(),
                TextColumn::make('vehicle_brand')
                    ->searchable(),
                TextColumn::make('vehicle_registration_number')
                    ->searchable(),
                TextColumn::make('vehicle_color')
                    ->searchable(),
                TextColumn::make('registration_date')
                    ->searchable(),
                TextColumn::make('partner_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('partner_name')
                    ->searchable(),
                TextColumn::make('partner_address')
                    ->searchable(),
                TextColumn::make('partner_document_number')
                    ->searchable(),
                IconColumn::make('law_27181')
                    ->boolean(),
                IconColumn::make('law_27189')
                    ->boolean(),
                IconColumn::make('ds_017_09_mtc')
                    ->boolean(),
                IconColumn::make('ds_055_10_mtc')
                    ->boolean(),
                TextColumn::make('om_number_1')
                    ->searchable(),
                TextColumn::make('om_number_2')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
                RestoreAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
