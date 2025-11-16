<?php

namespace App\Filament\Resources\InternmentRecords\Schemas;

use App\Models\InternmentRecordItem;
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
                            ->relationship('transportAssociation', 'name')
                            ->required()
                            ->native(false)
                            ->searchable()
                            ->preload()
                            ->reactive()
                            ->columnSpanFull(),

                        Select::make('partner_id')
                            ->label('Socio / Propietario')
                            ->relationship('partner', 'name')
                            ->required()
                            ->native(false)
                            ->searchable()
                            ->preload()
                            ->reactive(),
                        TextInput::make('partner_name')->label('Nombres del socio / propietario'),

                        Select::make('driver_id')
                            ->label('Conductor')
                            ->relationship('driver', 'name')
                            ->required()
                            ->native(false)
                            ->searchable()
                            ->preload()
                            ->reactive(),
                        TextInput::make('driver_name')->label('Nombre del conductor'),
                    ])
                    ->columnSpanFull()
                    ->columns(2),

                Section::make('Información del vehículo')
                    ->schema([
                        Select::make('vehicle_id')
                            ->label('Vehículo')
                            ->relationship('vehicle', 'plate')
                            ->required()
                            ->native(false)
                            ->searchable()
                            ->preload()
                            ->reactive()
                            ->columnSpanFull(),

                        TextInput::make('plate')
                            ->label('Placa')
                            ->required(),
                        TextInput::make('engine_number')->label('Número de motor'),
                        TextInput::make('serial_number')->label('Número de serie'),
                        TextInput::make('model')->label('Modelo'),
                        TextInput::make('brand')->label('Marca'),
                        TextInput::make('vehicle_class')->label('Clase de vehículo'),
                        TextInput::make('color')->label('Color'),
                        TextInput::make('body_type')->label('carrocería'),
                        DatePicker::make('manufacturing_year')->format('d/m/Y')->label('Año de fabricación'),


                    ])
                    ->columnSpanFull()
                    ->columns(2),

                Section::make('Infracción')
                    ->schema([
                        TextInput::make('pnp_ticket')->label('Papeleta PNP'),
                        TextInput::make('infraction_comisaria')->label('Infracción Comisaría'),
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
                    ->relationship('items')
                    ->table([
                        TableColumn::make('Aspecto Exterior'),
                        TableColumn::make('Estado'),
                        TableColumn::make('Categoría'),
                    ])
                    ->schema([
                        TextInput::make('item')
                            ->disabled() // se muestra y se envía al backend
                            ->dehydrated(true)
                            ->extraAttributes([
                                'class' => 'border-0 p-0 bg-transparent shadow-none',
                            ]), // lo obliga a enviarse aunque esté disabled

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

                /*  Repeater::make('Aspecto Interior')
                    ->label('')
                     ->relationship('items') 
                    ->table([
                        TableColumn::make('Aspecto Interior'),
                        TableColumn::make('Estado'),
                        TableColumn::make('Categoría'),
                    ])
                    ->schema([
                        TextEntry::make('item'),
                        TextEntry::make('category'),
                        Radio::make('status')
                            ->options([
                                'B' => 'B',
                                'R' => 'R',
                                'D' => 'D',
                                'N/T' => 'N/T',
                            ])
                            ->inline(),
                    ])
                    ->default(
                        fn() =>
                        collect(\App\Models\InternmentRecordItem::interior())
                            ->map(fn($i) => [
                                'item' => $i,
                                'status' => null,
                                'category' => 'interior',
                            ])
                            ->toArray()
                    )
                    ->columnSpanFull()
                    ->deletable(false)
                    ->orderColumn(false)
                    ->addable(false) */
            ]);
    }
}
