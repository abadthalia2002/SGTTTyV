<?php

namespace App\Filament\Resources\TransportAssociations\Schemas;

use App\Filament\Resources\Partners\Schemas\PartnerForm;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Schema as FacadesSchema;

class TransportAssociationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('document_number')
                    ->label('RUC')
                    ->required()
                    ->unique(
                        table: 'transport_associations',
                        column: 'document_number',
                        ignoreRecord: true,
                    )
                    ->numeric()
                    ->minLength(11)
                    ->maxLength(11)
                    ->regex('/^\d{11}$/')
                    ->validationMessages([
                        'unique' => 'El RUC ingresado ya existe.',
                        'regex' => 'El RUC debe tener 11 dígitos numéricos.',
                        'min_digits' => 'El RUC debe tener 11 dígitos.',
                        'max_digits' => 'El RUC debe tener 11 dígitos.',
                    ]),
                TextInput::make('name')
                    ->label('Nombre de la Asociación')
                    ->required(),
                Textarea::make('description')
                    ->label('Descripción')
                    ->columnSpanFull(),
                Textarea::make('location')
                    ->label('Dirección')
                    ->required()
                    ->columnSpanFull(),
                /* Select::make('partner_id')
                    ->label('Representante Legal')
                    ->relationship('partner', 'name')
                    ->required()
                    ->native(false)
                    ->createOptionForm(PartnerForm::configure(Schema::make())->getComponents()), */

                Select::make('partner_id')
                    ->label('Representante Legal')
                    ->relationship(
                        name: 'partner',
                        titleAttribute: 'name',
                        modifyQueryUsing: function ($query, callable $get) {

                            $currentPartner = $get('partner_id');

                            $query->where(function ($q) use ($currentPartner) {

                                // Partners que NO tienen asociación
                                $q->whereNull('transport_association_id');

                                // En edición → incluir el actualmente asignado
                                if ($currentPartner) {
                                    $q->orWhere('id', $currentPartner);
                                }
                            });
                        }
                    )
                    ->required()
                    ->native(false)
                    ->createOptionForm(
                        PartnerForm::configure(Schema::make())->getComponents()
                    )


            ]);
    }
}
