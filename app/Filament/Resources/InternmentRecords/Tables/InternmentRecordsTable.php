<?php

namespace App\Filament\Resources\InternmentRecords\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InternmentRecordsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('transport_association_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('partner_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('partner_name')
                    ->searchable(),
                TextColumn::make('driver_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('driver_name')
                    ->searchable(),
                TextColumn::make('vehicle_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('plate')
                    ->searchable(),
                TextColumn::make('engine_number')
                    ->searchable(),
                TextColumn::make('serial_number')
                    ->searchable(),
                TextColumn::make('model')
                    ->searchable(),
                TextColumn::make('brand')
                    ->searchable(),
                TextColumn::make('vehicle_class')
                    ->searchable(),
                TextColumn::make('color')
                    ->searchable(),
                TextColumn::make('body_type')
                    ->searchable(),
                TextColumn::make('manufacturing_year')
                    ->searchable(),
                TextColumn::make('pnp_ticket')
                    ->searchable(),
                TextColumn::make('infraction_comisaria')
                    ->searchable(),
                TextColumn::make('infraction_id')
                    ->numeric()
                    ->sortable(),
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
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
