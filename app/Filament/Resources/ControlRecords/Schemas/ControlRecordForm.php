<?php

namespace App\Filament\Resources\ControlRecords\Schemas;

use App\Enums\StatusControlRecordEnum;
use App\Filament\Resources\Drivers\Schemas\DriverForm;
use App\Filament\Resources\Vehicles\Schemas\VehicleForm;
use App\Models\Driver;
use App\Models\Vehicle;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use PhpParser\Node\Expr\FuncCall;

class ControlRecordForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Información Principal')
                    ->schema([
                        Select::make('transport_association_id')
                            ->label('Asociación de Transporte')
                            ->relationship(name: 'transportAssociation', titleAttribute: 'name')
                            ->searchable(['name', 'document_number'])
                            ->required()
                            ->native(false)
                            ->preload()
                            ->reactive()
                            ->afterStateUpdated(function (callable $set) {
                                // Reset socio y conductor cuando cambie la asociación
                                $set('partner_id', null);
                                $set('driver_id', null);
                                $set('partner_name', null);
                                $set('driver_name', null);
                            })
                            ->columnSpanFull(),
                        TextInput::make('name')
                            ->required()
                            ->label('Nombre / Razón Social'),

                        TextInput::make('intervention_place')
                            ->required()
                            ->label('Lugar de la intervención'),

                        DatePicker::make('date')
                            ->format('Y-m-d')
                            ->native(false)
                            ->required(),

                        TimePicker::make('time')
                            ->format('H:i')
                            ->native(false)
                            ->required(),

                    ])
                    ->columns(2)
                    ->columnSpanFull(),


                Section::make('Información del conductor')
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
                            ->disabled(
                                fn($get) =>
                                $get('transport_association_id') === null
                            )
                            ->afterStateUpdated(
                                function ($state, callable $set) {
                                    $set('driver_name', optional(Driver::find($state))->name);
                                    $set('driver_license_number', optional(Driver::find($state))->license_number);
                                    $set('driver_document_number', optional(Driver::find($state))->document_number);
                                    $set('driver_license_class', optional(Driver::find($state))->license_type);
                                }

                            )
                            ->createOptionForm(DriverForm::configure(Schema::make())->getComponents()),

                        TextInput::make('driver_name')
                            ->label('Nombres y Apellidos')
                            ->required()
                            ->disabled()
                            ->dehydrated(true),

                        TextInput::make('driver_license_number')
                            ->label('Número de Licencia')
                            ->required()
                            ->disabled()
                            ->dehydrated(true),
                        TextInput::make('driver_document_number')
                            ->label('DNI')
                            ->required()
                            ->disabled()
                            ->dehydrated(true),
                        TextInput::make('driver_license_class')
                            ->label('Tipo de Licencia')
                            ->required()
                            ->disabled()
                            ->dehydrated(true),

                        /*  TextInput::make('driver_license_category'), */

                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Información Vehicular')
                    ->schema([

                        Select::make('vehicle_id')
                            ->label('Vehículo')
                            ->relationship('vehicle', 'plate', function ($query, $get) {
                                // Filtrar vehículos del socio seleccionado
                                if ($get('driver_id')) {
                                    $query->where('driver_id', $get('driver_id'));
                                }
                            })
                            ->required()
                            ->native(false)
                            ->searchable(['plate'])
                            ->preload()
                            ->reactive()
                            /*  ->disabled(
                                fn($get) =>

                                $get('partner_id') === null
                            ) */
                            ->afterStateUpdated(function ($state, callable $set) {

                                $set('vehicle_plate', optional(Vehicle::find($state))->plate);
                                $set('brand', optional(Vehicle::find($state))->brand);
                                $set('vehicle_class', optional(Vehicle::find($state))->type);
                                $set('model', optional(Vehicle::find($state))->model);
                            })
                            ->columnSpanFull()
                            ->createOptionForm(VehicleForm::configure(Schema::make())->getComponents()),

                        TextInput::make('vehicle_authorization_number')
                            ->label('Número de habilitación vehicular'),

                        TextInput::make('vehicle_plate')
                            ->label('Placa del vehículo')
                            ->required()
                            ->disabled()
                            ->dehydrated(true),
                        Textarea::make('service_mode')
                            ->label('Modalidad del servicio')
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Infracción')
                    ->schema([
                        Select::make('infraction_id')
                            ->label('Infracción')
                            ->relationship('infraction', 'code')
                            ->required()
                            ->native(false)
                            ->searchable()
                            ->preload()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                if ($state) {
                                    $infraction = \App\Models\Infraction::find($state);

                                    if ($infraction) {
                                        $set('payment_amount', $infraction->amount);
                                    }
                                }
                            }),


                        TextInput::make('infraction_code_detected')
                            ->required()
                            ->label('Código de Infracción Detectado'),
                        TextInput::make('detected_non_compliance_code')
                            ->required()
                            ->label('Código de Incumplimiento Detectado'),
                    ]),

                Section::make('Información adicional')
                    ->schema([
                        TextInput::make('route_origin')
                            ->required()
                            ->label('Ruta en la que se presta el servicio al ser intervenido origen'),
                        TextInput::make('route_destination')
                            ->required()
                            ->label('Destino'),
                    ]),
                Textarea::make('verification_findings')
                    ->label('Producto de Verificación se detectó lo siguiente')
                    ->columnSpanFull(),
                Textarea::make('infraction_description_location')
                    ->label('Descripción y Ubicación del Local')
                    ->columnSpanFull(),
                Textarea::make('admin_statement')
                    ->label('Manifestación del Administrativo')
                    ->columnSpanFull(),


                TextInput::make('payment_amount')
                    ->label('Monto por pagar')
                    ->numeric()
                    ->prefix('S/')
                    ->rule('min:0')
                    ->disabled()
                    ->dehydrated(true)
                    ->required(),



                Select::make('status')
                    ->label('Estado de Pago')
                    ->options(
                        collect(StatusControlRecordEnum::cases())
                            ->mapWithKeys(fn($case) => [$case->value => $case->label()])
                            ->toArray()
                    )
                    ->default(StatusControlRecordEnum::PENDIENTE->value)
                    ->required(),



            ]);
    }
}
