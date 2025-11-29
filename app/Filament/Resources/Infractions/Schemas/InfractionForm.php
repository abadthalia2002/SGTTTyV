<?php

namespace App\Filament\Resources\Infractions\Schemas;

use App\Enums\TargetInfractionEnum;
use App\Enums\TypeInfractionEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class InfractionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('target')
                    ->options(TargetInfractionEnum::class)
                    ->label('Dirigir a')
                    ->native(false)
                    ->required(),
                TextInput::make('code')
                    ->label('Código')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->label('Descripción')
                    ->columnSpanFull(),
                Select::make('type')
                    ->options(
                        collect(TypeInfractionEnum::cases())
                            ->mapWithKeys(fn($case) => [$case->value => $case->value])
                    )
                    ->label('Tipo')
                    ->native(false),
                TextInput::make('sanction_percentage')
                    ->label('Porcentaje de sanción')
                    ->required()
                    ->numeric(),
                Textarea::make('complementary_measure')
                    ->label('Medida complementaria'),
            ]);
    }
}
