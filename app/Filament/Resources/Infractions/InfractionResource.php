<?php

namespace App\Filament\Resources\Infractions;

use App\Filament\Resources\Infractions\Pages\CreateInfraction;
use App\Filament\Resources\Infractions\Pages\EditInfraction;
use App\Filament\Resources\Infractions\Pages\ListInfractions;
use App\Filament\Resources\Infractions\Pages\ViewInfraction;
use App\Filament\Resources\Infractions\Schemas\InfractionForm;
use App\Filament\Resources\Infractions\Schemas\InfractionInfolist;
use App\Filament\Resources\Infractions\Tables\InfractionsTable;
use App\Models\Infraction;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class InfractionResource extends Resource
{
    protected static ?string $model = Infraction::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Infracción';

    protected static ?string $navigationLabel = 'Infracciones';

    protected static ?string $pluralLabel = 'Infracciones';

    protected static ?string $modelLabel = 'Infracción';

    protected static ?int $navigationSort = 20;

    protected static string|UnitEnum|null $navigationGroup = 'Configuración';

    public static function form(Schema $schema): Schema
    {
        return InfractionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return InfractionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InfractionsTable::configure($table);
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
            'index' => ListInfractions::route('/'),
            'create' => CreateInfraction::route('/create'),
            'view' => ViewInfraction::route('/{record}'),
            'edit' => EditInfraction::route('/{record}/edit'),
        ];
    }
}
