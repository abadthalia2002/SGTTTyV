<?php

namespace App\Filament\Resources\TransportAssociations\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class PartnersRelationManager extends RelationManager
{
    protected static string $relationship = 'partners';
    protected static ?string $title = 'Socios';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nombre'),
                TextColumn::make('documentType.abbreviation')->label('Tipo Doc.'),
                TextColumn::make('document_number')->label('N° Documento'),
                TextColumn::make('phone')->label('Teléfono'),
            ])
            ->emptyStateHeading('No hay socios registrados');
    }
}
