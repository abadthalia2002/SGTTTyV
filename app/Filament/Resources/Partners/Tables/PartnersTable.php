<?php

namespace App\Filament\Resources\Partners\Tables;

use App\Models\TransportAssociation;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PartnersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('documentType.abbreviation')
                    ->label('Tipo de Documento')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('document_number')
                    ->label('Numero de Documento')
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable(),
                TextColumn::make('address')
                    ->label('Direccion')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('phone')
                    ->label('Nº de Telefono')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                TextColumn::make('civil_status')
                    ->label('Estado Civil')
                    ->searchable(),
                TextColumn::make('transportAssociation.name')
                    ->label('Asociación de Transporte')
                    ->sortable()
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
            ])
            ->defaultSort(function ($query) {
            return $query->orderBy(
                \App\Models\TransportAssociation::select('name')
                    ->whereColumn('transport_associations.id', 'partners.transport_association_id')
                    ->limit(1),
                'asc'
            );
        });
    }
}
