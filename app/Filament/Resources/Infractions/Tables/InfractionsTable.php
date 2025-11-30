<?php

namespace App\Filament\Resources\Infractions\Tables;

use App\Enums\TargetInfractionEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class InfractionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->label('Código')
                    ->searchable(),
                TextColumn::make('type')
                    ->label('Tipo')
                    ->searchable(),
                TextColumn::make('sanction_percentage')
                    ->label('Porcentaje de sanción')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('complementary_measure')
                    ->label('Medida complementaria')
                    ->searchable(),
                TextColumn::make('amount')
                    ->label('Monto')
                    ->prefix('S/. ')
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
                SelectFilter::make('target')
                    ->label('Dirigido a')
                    ->options(
                        collect(TargetInfractionEnum::cases())
                            ->mapWithKeys(fn($case) => [$case->value => ucfirst($case->value)])
                    )

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
