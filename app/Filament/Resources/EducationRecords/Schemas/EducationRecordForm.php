<?php

namespace App\Filament\Resources\EducationRecords\Schemas;

use App\Models\Driver;
use App\Models\Partner;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EducationRecordForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Datos Generales')
                    ->schema([

                        Select::make('transport_association_id')
                            ->label('Asociación de Transporte')
                            ->relationship('transportAssociation', 'name')
                            ->searchable(['name', 'document_number'])
                            ->preload()
                            ->native(false)
                            ->reactive()
                            ->required()
                            ->afterStateUpdated(function (callable $set) {
                                $set('driver_id', null);
                                $set('partner_id', null);
                            })
                            ->columnSpanFull(),

                        DatePicker::make('date')
                            ->label('Fecha')
                            ->native(false)
                            ->required(),

                        TimePicker::make('time')
                            ->label('Hora')
                            ->native(false)
                            ->required(),

                        TextInput::make('location')
                            ->label('Lugar')
                            ->required(),

                    ])
                    ->columns(2)
                    ->columnSpanFull(),


                /*
            |--------------------------------------------------------------------------
            | SECCIÓN 2 - DATOS DEL CONDUCTOR
            |--------------------------------------------------------------------------
            */
                Section::make('Datos del Conductor')
                    ->schema([

                        Select::make('driver_id')
                            ->label('Conductor')
                            ->relationship(
                                'driver',
                                'name',
                                fn($query, $get) =>
                                $query->where('transport_association_id', $get('transport_association_id'))
                            )
                            ->required()
                            ->native(false)
                            ->searchable(['name', 'document_number'])
                            ->preload()
                            ->reactive()
                            ->disabled(fn($get) => $get('transport_association_id') === null)
                            ->afterStateUpdated(function ($state, callable $set) {
                                $driver = Driver::find($state);

                                $set('driver_name', $driver?->name);
                                $set('driver_document_number', $driver?->document_number);
                                $set('license_class', $driver?->license_type);
                                $set('license_number', $driver?->license_number);
                            }),

                        TextInput::make('driver_name')
                            ->label('Nombres y Apellidos')
                            ->disabled()
                            ->required()
                            ->dehydrated(true),

                        TextInput::make('driver_document_number')
                            ->label('Número de Documento')
                            ->disabled()
                            ->required()
                            ->dehydrated(true),

                        TextInput::make('license_class')
                            ->label('Clase de Licencia')
                            ->disabled()
                            ->required()
                            ->dehydrated(true),

                        TextInput::make('license_number')
                            ->label('Número de Licencia')
                            ->disabled()
                            ->required()
                            ->dehydrated(true),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),


                /*
            |--------------------------------------------------------------------------
            | SECCIÓN 3 - DATOS DEL VEHÍCULO
            |--------------------------------------------------------------------------
            */
                Section::make('Datos del Vehículo')
                    ->schema([

                        Select::make('vehicle_id')
                            ->label('Vehículo')
                            ->relationship('vehicle', 'plate')
                            ->searchable()
                            ->preload()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                if (!$state) {
                                    return;
                                }

                                $vehicle = \App\Models\Vehicle::with('partner')->find($state);

                                if ($vehicle) {
                                    // Completar los campos del vehículo
                                    $set('vehicle_plate', $vehicle->plate);
                                    $set('vehicle_brand', $vehicle->brand);
                                    $set('vehicle_class', $vehicle->type);
                                    $set('vehicle_color', $vehicle->model); // O color si tienes campo
                                    $set('vehicle_registration_number', $vehicle->registration_number ?? null);
                                    $set('registration_date', $vehicle->registration_date ?? null);

                                    // AUTOCOMPLETAR PROPIETARIO
                                    if ($vehicle->partner) {
                                        $set('partner_id', $vehicle->partner->id);
                                        $set('partner_name', $vehicle->partner->name);
                                        $set('partner_address', $vehicle->partner->address);
                                        $set('partner_document_number', $vehicle->partner->document_number);
                                    }
                                }
                            })
                            ->required(),

                        TextInput::make('vehicle_plate')->label('Placa')->disabled(),
                        TextInput::make('vehicle_brand')->label('Marca')->disabled(),
                        TextInput::make('vehicle_class')->label('Clase')->disabled(),
                        TextInput::make('vehicle_color')->label('Color')->disabled(),
                        TextInput::make('vehicle_registration_number')->label('N° Tarjeta'),
                        TextInput::make('registration_date')->label('Fecha Inscripción'),

                    ])
                    ->columns(3)
                    ->columnSpanFull(),

                /*
            |--------------------------------------------------------------------------
            | SECCIÓN 4 - DATOS DEL PROPIETARIO
            |--------------------------------------------------------------------------
            */
                Section::make('Datos del Propietario')
                    ->schema([

                        Select::make('partner_id')
                            ->label('Propietario')
                            ->relationship(
                                'partner',
                                'name',
                                fn($query, $get) =>
                                $query->where('transport_association_id', $get('transport_association_id'))
                            )
                            ->native(false)
                            ->searchable(['name', 'document_number'])
                            ->preload()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                $partner = Partner::find($state);

                                $set('partner_name', $partner?->name);
                                $set('partner_document_number', $partner?->document_number);
                                $set('partner_address', $partner?->address);
                            }),

                        TextInput::make('partner_name')
                            ->label('Nombre del Propietario')
                            ->disabled()
                            ->dehydrated(true),

                        TextInput::make('partner_document_number')
                            ->label('Número de Documento')
                            ->disabled()
                            ->dehydrated(true),

                        TextInput::make('partner_address')
                            ->label('Dirección')
                            ->disabled()
                            ->dehydrated(true),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),


                /*
            |--------------------------------------------------------------------------
            | SECCIÓN 5 - INFRACCIÓN
            |--------------------------------------------------------------------------
            */
                Section::make('Infracción')
                    ->schema([

                        Checkbox::make('law_27181')->label('Ley N° 27181'),
                        Checkbox::make('law_27189')->label('Ley N° 27189'),
                        Checkbox::make('ds_017_09_mtc')->label('D.S. 017-09-MTC'),
                        Checkbox::make('ds_055_10_mtc')->label('D.S. 055-10-MTC'),

                        TextInput::make('om_number_1')
                            ->label('O.M. Número 1'),

                        TextInput::make('om_number_2')
                            ->label('O.M. Número 2'),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),


                /*
            |--------------------------------------------------------------------------
            | SECCIÓN 6 - INFORMACIÓN ADICIONAL
            |--------------------------------------------------------------------------
            */
                Section::make('Información Adicional')
                    ->schema([

                        Textarea::make('additional_information')
                            ->label('Información Adicional')
                            ->columnSpanFull(),

                        Textarea::make('driver_observations')
                            ->label('Observaciones del Conductor')
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),

            ]);
    }
}
