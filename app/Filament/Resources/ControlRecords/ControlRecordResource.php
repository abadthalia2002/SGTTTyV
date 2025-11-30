<?php

namespace App\Filament\Resources\ControlRecords;

use App\Filament\Resources\ControlRecords\Pages\CreateControlRecord;
use App\Filament\Resources\ControlRecords\Pages\EditControlRecord;
use App\Filament\Resources\ControlRecords\Pages\ListControlRecords;
use App\Filament\Resources\ControlRecords\Pages\ViewControlRecord;
use App\Filament\Resources\ControlRecords\Schemas\ControlRecordForm;
use App\Filament\Resources\ControlRecords\Schemas\ControlRecordInfolist;
use App\Filament\Resources\ControlRecords\Tables\ControlRecordsTable;
use App\Models\ControlRecord;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ControlRecordResource extends Resource
{
    protected static ?string $model = ControlRecord::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static string|UnitEnum|null $navigationGroup = 'Actas';

    protected static ?string $recordTitleAttribute = 'Acta de Control';

    protected static ?string $navigationLabel = 'Actas de Control';

    protected static ?string $pluralLabel = 'Actas de Control';

    protected static ?string $modelLabel = 'Acta de Control';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return ControlRecordForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ControlRecordInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ControlRecordsTable::configure($table);
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
            'index' => ListControlRecords::route('/'),
            'create' => CreateControlRecord::route('/create'),
            'view' => ViewControlRecord::route('/{record}'),
            'edit' => EditControlRecord::route('/{record}/edit'),
        ];
    }
}
