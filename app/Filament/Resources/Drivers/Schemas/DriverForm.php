<?php

namespace App\Filament\Resources\Drivers\Schemas;

use App\Enums\LicenseType;
use App\Enums\LicenseTypeEnum;
use App\Models\DocumentType;
use App\Models\Partner;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Notifications\Notification;

class DriverForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Select::make('transport_association_id')
                ->label('Asociación de Transporte')
                ->relationship('transportAssociation', 'name')
                ->required()
                ->searchable()
                ->preload()
                ->reactive(),

            Select::make('partner_id')
                ->label('Socio')
                ->options(function (callable $get) {
                    $associationId = $get('transport_association_id');

                    // ⚠️ Si no ha elegido asociación, no mostramos nada
                    if (!$associationId) {
                        return [];
                    }

                    // 🔍 Traer solo socios de la asociación seleccionada
                    // que aún no estén registrados como conductores
                    return Partner::where('transport_association_id', $associationId)
                        ->whereDoesntHave('driver') // 👈 socio sin conductor asignado
                        ->pluck('name', 'id');
                })
                ->searchable()
                ->preload()
                ->reactive()
                ->dehydrated()
                ->disabled(fn(callable $get) => !$get('transport_association_id'))
                ->afterStateUpdated(function ($state, callable $set) {
                    if ($state) {
                        $partner = Partner::find($state);

                        if ($partner) {
                            $set('document_type_id', $partner->document_type_id);
                            $set('document_number', $partner->document_number);
                            $set('name', $partner->name);

                            Notification::make()
                                ->title('Datos del socio cargados')
                                ->body("Se completaron los datos de {$partner->name}.")
                                ->success()
                                ->send();
                        }
                    } else {
                        $set('document_type_id', null);
                        $set('document_number', null);
                        $set('name', null);
                    }
                }),


            Select::make('document_type_id')
                ->label('Tipo de documento')
                ->relationship('documentType', 'abbreviation')
                ->required()
                ->searchable()
                ->preload()
                ->reactive()

                ->afterStateUpdated(function (callable $set, $state) {
                    if ($state) {
                        $documentType = DocumentType::find($state);

                        if ($documentType) {
                            $set('number_min_length', $documentType->number_min_length);
                            $set('number_max_length', $documentType->number_max_length);
                            $set('number_regex', $documentType->number_regex);
                        }
                    }
                }),

            TextInput::make('document_number')
                ->label('Número de Documento')
                ->required()
                ->reactive()
                ->unique(
                    table: 'drivers',
                    column: 'document_number',
                    ignoreRecord: true,
                   /*  modifyRuleUsing: function ($rule, callable $get) {
                        return $rule->where('document_type_id', $get('document_type_id'));
                    } */
                )
                ->rule(function (callable $get) {
                    $min = $get('number_min_length');
                    $max = $get('number_max_length');
                    $regex = $get('number_regex');

                    $rules = [];
                    if ($min) $rules[] = "min:$min";
                    if ($max) $rules[] = "max:$max";
                    if ($regex) $rules[] = "regex:$regex";

                    return $rules;
                })
                ->helperText(function (callable $get) {
                    $min = $get('number_min_length');
                    $max = $get('number_max_length');

                    return ($min && $max)
                        ? "Debe tener entre {$min} y {$max} caracteres."
                        : null;
                })
                ->validationMessages([
                    'unique' => 'El número de documento ya existe para este tipo de documento.',
                ]),

            TextInput::make('number_min_length')->hidden(),
            TextInput::make('number_max_length')->hidden(),
            TextInput::make('number_regex')->hidden(),

            TextInput::make('name')
                ->label('Nombres y Apellidos')
                ->required()
                ->dehydrated(),

            Select::make('license_type')
                ->label('Tipo de Licencia')
                ->options(
                    collect(\App\Enums\LicenseTypeEnum::cases())
                        ->mapWithKeys(fn($case) => [$case->value => $case->value])
                        ->toArray()
                )
                ->required()
                ->native(false),


            TextInput::make('license_number')
                ->label('Número de Licencia')
                ->required(),

        ]);
    }
}
