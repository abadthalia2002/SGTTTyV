<?php

namespace App\Filament\Resources\TransportAssociations\RelationManagers;

use Filament\Actions\Action;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;

class PartnersRelationManager extends RelationManager
{
    protected static string $relationship = 'partners';
    protected static ?string $title = 'Socios';

    public function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('name')
                    ->label('Nombres y Apellidos')
                    ->sortable(),

        


                /*  ->badgeColor('success') */



                /* TextColumn::make('name')
                    ->label('Nombre')
                    ->formatStateUsing(function ($state, $record) {
                        $assoc = $record->transportAssociation;

                        // Si no hay asociación o no coincide → solo el nombre
                        if (! $assoc || $record->id !== $assoc->partner_id) {
                            return $state;
                        }

                        // Si ES representante legal → nombre + badge
                        return $state . ' <span class="px-2 py-1 text-xs rounded-lg bg-green-600 text-white ml-2">Representante Legal</span>';
                    })
                    ->html(), // 👈 Necesario para renderizar el badge HTML */

                TextColumn::make('documentType.abbreviation')->label('Tipo Doc.'),
                TextColumn::make('document_number')->label('N° Documento'),
                /* TextColumn::make('phone')->label('Teléfono'), */

                 TextColumn::make('Rol')
                    ->label('Rol')
                    ->getStateUsing(function ($record) {
                        return $record->id === $record->transportAssociation->partner_id
                            ? 'Representante Legal'
                            : 'Socio';
                    })
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Representante Legal' => 'success', 
                        'Socio' => 'warning',                
                        default => 'secondary',
                    })
                    ->sortable(),

            ])
            ->recordActions([
                Action::make('setRepresentative')
                    ->label('Asignar como Representante Legal')
                    ->visible(
                        fn($record) =>
                        $record->id !== $record->transportAssociation->partner_id
                    )
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $record->transportAssociation->update([
                            'partner_id' => $record->id
                        ]);
                    })
                    ->color('primary')
                    ->icon('heroicon-o-user-circle'),

            ])
            ->emptyStateHeading('No hay socios registrados');
    }
}
