<?php

namespace App\Filament\Resources\Drivers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DriversTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('document_type_id')
                    ->label('Tipo de Documento')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('document_number')
                    ->label('Número de Documento')
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Nombres y Apellidos')
                    ->searchable(),
                TextColumn::make('license_number')
                    ->label('Número de Licencia')
                    ->searchable(),
                TextColumn::make('license_type')
                    ->label('Tipo de Licencia')
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
