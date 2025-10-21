<?php

namespace App\Filament\Resources\TransportAssociations;

use App\Filament\Resources\TransportAssociations\Pages\CreateTransportAssociation;
use App\Filament\Resources\TransportAssociations\Pages\EditTransportAssociation;
use App\Filament\Resources\TransportAssociations\Pages\ListTransportAssociations;
use App\Filament\Resources\TransportAssociations\Pages\ViewTransportAssociation;
use App\Filament\Resources\TransportAssociations\Schemas\TransportAssociationForm;
use App\Filament\Resources\TransportAssociations\Schemas\TransportAssociationInfolist;
use App\Filament\Resources\TransportAssociations\Tables\TransportAssociationsTable;
use App\Models\TransportAssociation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class TransportAssociationResource extends Resource
{
    protected static ?string $model = TransportAssociation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice;

    protected static string|UnitEnum|null $navigationGroup = 'Gestión de Asociaciones';

     protected static ?string $navigationLabel = 'Asociaciones de Transporte';

    protected static ?string $pluralLabel = 'Asociaciones de Transporte';

    protected static ?string $modelLabel = 'Asociación de Transporte';

     protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return TransportAssociationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TransportAssociationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TransportAssociationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTransportAssociations::route('/'),
            'create' => CreateTransportAssociation::route('/create'),
            'view' => ViewTransportAssociation::route('/{record}'),
            'edit' => EditTransportAssociation::route('/{record}/edit'),
        ];
    }
}
