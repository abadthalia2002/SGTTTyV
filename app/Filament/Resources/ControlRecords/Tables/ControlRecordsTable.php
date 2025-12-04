<?php

namespace App\Filament\Resources\ControlRecords\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class ControlRecordsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('transportAssociation.name')
                    ->label('Asociación de Transporte')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('date')
                    ->date()
                    ->sortable()
                    ->label('Fecha'),
                TextColumn::make('time')
                    ->time()
                    ->sortable()
                    ->label('Hora'),
                TextColumn::make('intervention_place')
                    ->searchable()
                    ->label('Lugar de la Intervención'),
                TextColumn::make('name')
                    ->searchable()
                    ->label('Nombre / Razón Social'),
                TextColumn::make('vehicle_id')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('vehicle_authorization_number')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('vehicle_plate')
                    ->searchable()
                    ->label('Placa del Vehículo'),
                TextColumn::make('route_origin')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('route_destination')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('driver_id')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('driver_name')
                    ->label('Conductor')
                    ->searchable(),
                TextColumn::make('driver_license_number')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('driver_document_number')
                    ->searchable()
                     ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('driver_license_class')
                    ->searchable()
                     ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('driver_license_category')
                    ->searchable()
                     ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('infraction.code')
                    ->sortable()
                    ->label('Infracción'),
                TextColumn::make('infraction_code_detected')
                    ->searchable()
                     ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('detected_non_compliance_code')
                    ->searchable()
                     ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('verification_findings')
                    ->searchable()
                     ->toggleable(isToggledHiddenByDefault: true),
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
