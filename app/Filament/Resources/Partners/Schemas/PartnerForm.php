<?php

namespace App\Filament\Resources\Partners\Schemas;

use App\Enums\CivilStatusEnum;
use App\Models\DocumentType;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rule;

class PartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
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

                    // Reglas dinámicas MIN/MAX/REGEX
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

                    // 🔥 ESTA ES LA PARTE QUE RESUELVE EL PROBLEMA
                    ->unique(
                        table: 'partners',
                        column: 'document_number',
                        ignoreRecord: true,
                        /*  modifyRuleUsing: function ($rule, callable $get) {
                            return $rule->where('document_type_id', $get('document_type_id'));
                        } */
                    )
                    // FIN SOLUCIÓN 🔥

                    ->helperText(function (callable $get) {
                        $min = $get('number_min_length');
                        $max = $get('number_max_length');

                        return ($min && $max)
                            ? "Debe tener entre {$min} y {$max} caracteres."
                            : null;
                    })
                    ->validationMessages([
                        'unique' => 'El número de documento ya existe.',
                        'regex' => 'El número de documento no cumple con el formato requerido.',
                        'min_digits' => 'El número de documento debe tener como minimo :min dígitos.',
                        'max_digits' => 'El número de documento debe tener como máximo :max dígitos.',
                        'max' => 'El número de documento no puede tener más de :max dígitos.',
                        'min' => 'El número de documento no puede tener menos de :min dígitos.',
                    ]),

                TextInput::make('number_min_length')->hidden(),
                TextInput::make('number_max_length')->hidden(),
                TextInput::make('number_regex')->hidden(),
                TextInput::make('name')
                    ->label('Nombres y Apellidos')
                    ->required(),
                TextInput::make('address')
                    ->label('Dirección'),
                TextInput::make('phone')
                    ->label('Número de Teléfono')
                    ->tel(),
                TextInput::make('email')
                    ->label('Correo Electrónico')
                    ->email(),

                Select::make('civil_status')
                    ->label('Estado civil')
                    ->options(collect(CivilStatusEnum::cases())
                        ->mapWithKeys(fn($case) => [$case->value => $case->label()])
                        ->toArray())
                    ->required()
                    ->native(false),

                Select::make('transport_association_id')
                    ->label('Asociación de Transporte')
                    ->relationship(
                        name: 'transportAssociation',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn($query) =>
                        $query->withCount([
                            'partners' => fn($q) =>
                            $q->whereNull('deleted_at')  // 👈 socios NO eliminados
                        ])
                            ->having('partners_count', '<', 50)
                    )
                    ->searchable()
                    ->preload()
                    ->reactive()


            ]);
    }
}
