<?php

namespace App\Filament\Resources\TransportAssociations\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class DriversRelationManager extends RelationManager
{
    protected static string $relationship = 'drivers';
    protected static ?string $title = 'Conductores';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nombre'),
                TextColumn::make('documentType.abbreviation')->label('Tipo Doc.'),
                TextColumn::make('document_number')->label('N° Documento'),
                TextColumn::make('license_number')->label('N° Licencia'),
                TextColumn::make('license_type')->label('Tipo Licencia'),
            ])
            ->emptyStateHeading('No hay conductores registrados');
    }
}
