<?php

namespace App\Filament\Resources\InternmentRecords;

use App\Filament\Resources\InternmentRecords\Pages\CreateInternmentRecord;
use App\Filament\Resources\InternmentRecords\Pages\EditInternmentRecord;
use App\Filament\Resources\InternmentRecords\Pages\ListInternmentRecords;
use App\Filament\Resources\InternmentRecords\Pages\ViewInternmentRecord;
use App\Filament\Resources\InternmentRecords\Schemas\InternmentRecordForm;
use App\Filament\Resources\InternmentRecords\Schemas\InternmentRecordInfolist;
use App\Filament\Resources\InternmentRecords\Tables\InternmentRecordsTable;
use App\Models\InternmentRecord;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class InternmentRecordResource extends Resource
{
    protected static ?string $model = InternmentRecord::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedWallet;

    protected static string|UnitEnum|null $navigationGroup = 'Actas';

    protected static ?string $recordTitleAttribute = 'Acta de Internamiento';

    protected static ?string $navigationLabel = 'Actas de Internamiento';

    protected static ?string $pluralLabel = 'Actas de Internamiento';

    protected static ?string $modelLabel = 'Acta de Internamiento';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return InternmentRecordForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return InternmentRecordInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InternmentRecordsTable::configure($table);
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
            'index' => ListInternmentRecords::route('/'),
            'create' => CreateInternmentRecord::route('/create'),
            'view' => ViewInternmentRecord::route('/{record}'),
            'edit' => EditInternmentRecord::route('/{record}/edit'),
        ];
    }
}
