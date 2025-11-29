<?php

namespace App\Filament\Resources\Vehicles\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class VehiclesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('plate')
                    ->label('Número de Placa')
                    ->searchable(),
                TextColumn::make('brand')
                    ->label('Marca')
                    ->searchable(),
                TextColumn::make('model')
                    ->label('Modelo')
                    ->searchable(),
                TextColumn::make('type')
                    ->label('Tipo de Vehículo')
                    ->searchable(),
                TextColumn::make('partner.name')
                    ->label('Propietario')
                    ->searchable(),
                TextColumn::make('driver.name')
                    ->label('Conductor')
                    ->searchable(),
                TextColumn::make('transportAssociation.name')
                    ->label('Asociación de Transporte')
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
                SelectFilter::make('association')
                    ->label('Asociación')
                    ->relationship('transportAssociation', 'name')
                    ->searchable(['name', 'document_number'])
                    ->preload()
                    ->emptyRelationshipOptionLabel('No hay asociaciones')
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
