<?php

namespace App\Filament\Resources\InternmentRecords\Schemas;

use App\Filament\Resources\Drivers\Schemas\DriverForm;
use App\Filament\Resources\Partners\Schemas\PartnerForm;
use App\Filament\Resources\Vehicles\Schemas\VehicleForm;
use App\Models\Driver;
use App\Models\InternmentRecordItem;
use App\Models\Partner;
use App\Models\Vehicle;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Repeater\TableColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\View;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use League\CommonMark\Extension\Table\TableCell;
use Symfony\Component\Console\Helper\TableRows;

class InternmentRecordForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Información Principal')
                    ->schema([
                        Select::make('transport_association_id')
                            ->label('Asociación de Transporte')
                            ->relationship(name:'transportAssociation', titleAttribute: 'name')
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

                        Select::make('partner_id')
                            ->label('Socio / Propietario')
                            ->relationship(
                                'partner',
                                'name',
                                fn($query, $get) =>
                                // Filtrar socios por asociación seleccionada
                                $query->where('transport_association_id', $get('transport_association_id'))
                            )
                            ->searchable(['name', 'document_number'])
                            ->required()
                            ->native(false)
                            ->preload()
                            ->reactive()
                            ->disabled(
                                fn($get) =>
                                $get('transport_association_id') === null
                            )
                            ->afterStateUpdated(
                               function (callable $set, $state) {
                                $set('partner_name', optional(Partner::find($state))->name);
                                $set('vehicle_id', null);
                                
                               }
                            )
                            ->createOptionForm(PartnerForm::configure(Schema::make())->getComponents()),

                        TextInput::make('partner_name')
                            ->label('Nombres del socio / propietario')
                            ->required()
                            ->disabled(),

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
                                fn($state, callable $set) =>
                                $set('driver_name', optional(Driver::find($state))->name)
                            )
                            ->createOptionForm(DriverForm::configure(Schema::make())->getComponents()),

                        TextInput::make('driver_name')
                            ->label('Nombre del conductor')
                            ->required()
                            ->disabled(),

                    ])
                    ->columnSpanFull()
                    ->columns(2),

                Section::make('Información del vehículo')
                    ->schema([
                        Select::make('vehicle_id')
                            ->label('Vehículo')
                            ->relationship('vehicle', 'plate', function ($query, $get) {
                                // Filtrar vehículos del socio seleccionado
                                if ($get('partner_id')) {
                                    $query->where('partner_id', $get('partner_id'));
                                }
                            })
                            ->required()
                            ->native(false)
                            ->searchable(['plate'])
                            ->preload()
                            ->reactive()
                            ->disabled(
                                fn($get) =>
                              
                                $get('partner_id') === null
                            )
                            ->afterStateUpdated(function ($state, callable $set) {
                                
                                 $set('plate', optional(Vehicle::find($state))->plate);
                                 $set('brand', optional(Vehicle::find($state))->brand);
                                 $set('vehicle_class', optional(Vehicle::find($state))->type);
                                 $set('model', optional(Vehicle::find($state))->model);
                            })
                            ->columnSpanFull()
                            ->createOptionForm(VehicleForm::configure(Schema::make())->getComponents()),


                        TextInput::make('plate')
                            ->label('Placa')
                            ->required(),
                        TextInput::make('engine_number')->label('Número de motor')->required(),
                        TextInput::make('serial_number')->label('Número de serie')->required(),
                        TextInput::make('model')->label('Modelo')->required(),
                        TextInput::make('brand')->label('Marca')->required(),
                        TextInput::make('vehicle_class')->label('Clase de vehículo')->required(),
                        TextInput::make('color')->label('Color')->required(),
                        TextInput::make('body_type')->label('Carrocería')->required(),
                        DatePicker::make('manufacturing_year')
                            ->format('d/m/Y')
                            ->label('Año de fabricación')
                            ->native(false)
                            ->required(),

                    ])
                    ->columnSpanFull()
                    ->columns(2),

                Section::make('Infracción')
                    ->schema([
                        TextInput::make('pnp_ticket')->label('Papeleta PNP')->required(),
                        TextInput::make('infraction_comisaria')->label('Infracción Comisaría')->required(),
                        Select::make('infraction_id')
                            ->label('Infracción')
                            ->relationship('infraction', 'code')
                            ->required()
                            ->native(false)
                            ->searchable()
                            ->preload()
                            ->reactive(),


                    ])
                    ->columnSpanFull()
                    ->columns(2),

                Textarea::make('observation')
                    ->columnSpanFull(),

                Repeater::make('Aspecto Exterior')
                    ->label('')
                    ->relationship('exteriorItems')
                    ->table([
                        TableColumn::make('Aspecto Exterior'),
                        TableColumn::make('Estado'),

                    ])
                    ->schema([
                        TextInput::make('item')
                            ->disabled()
                            ->dehydrated(true)
                            ->label(''),


                        Radio::make('status')
                            ->options([
                                'B' => 'B',
                                'R' => 'R',
                                'D' => 'D',
                                'N/T' => 'N/T',
                            ])
                            ->inline()
                            ->required()
                            ->dehydrated(true),
                        Hidden::make('category')
                            ->dehydrated(true),
                    ])
                    ->default(
                        fn() =>
                        collect(\App\Models\InternmentRecordItem::exterior())
                            ->map(fn($i) => [
                                'item' => $i,
                                'status' => null,
                                'category' => 'exterior',
                            ])
                            ->toArray()
                    )
                    ->columnSpanFull()
                    ->deletable(false)
                    ->orderColumn(false)
                    ->addable(false),


                Repeater::make('Aspecto Interior')
                    ->label('')
                    ->relationship('interiorItems')
                    ->table([
                        TableColumn::make('Aspecto Interior'),
                        TableColumn::make('Estado'),

                    ])
                    ->schema([
                        TextInput::make('item')
                            ->disabled()
                            ->dehydrated(true)
                            ->label(''),


                        Radio::make('status')
                            ->options([
                                'B' => 'B',
                                'R' => 'R',
                                'D' => 'D',
                                'N/T' => 'N/T',
                            ])
                            ->inline()
                            ->required()
                            ->dehydrated(true),
                        Hidden::make('category')
                            ->dehydrated(true),
                    ])
                    ->default(
                        fn() =>
                        collect(\App\Models\InternmentRecordItem::interior())
                            ->map(fn($i) => [
                                'item' => $i,
                                'status' => null,
                                'category' => 'interior'
                            ])
                            ->toArray()
                    )
                    ->columnSpanFull()
                    ->deletable(false)
                    ->orderColumn(false)
                    ->addable(false),


                Repeater::make('Sistema Eléctrico')
                    ->label('')
                    ->relationship('electricalSystemsItems')
                    ->table([
                        TableColumn::make('Sistema Eléctrico'),
                        TableColumn::make('Estado'),

                    ])
                    ->schema([
                        TextInput::make('item')
                            ->disabled()
                            ->dehydrated(true)
                            ->label(''),


                        Radio::make('status')
                            ->options([
                                'B' => 'B',
                                'R' => 'R',
                                'D' => 'D',
                                'N/T' => 'N/T',
                            ])
                            ->inline()
                            ->required()
                            ->dehydrated(true),
                        Hidden::make('category')
                            ->dehydrated(true),
                    ])
                    ->default(
                        fn() =>
                        collect(\App\Models\InternmentRecordItem::electricalSystems())
                            ->map(fn($i) => [
                                'item' => $i,
                                'status' => null,
                                'category' => 'sitema'
                            ])
                            ->toArray()
                    )
                    ->columnSpanFull()
                    ->deletable(false)
                    ->orderColumn(false)
                    ->addable(false),



            ]);
    }
}
