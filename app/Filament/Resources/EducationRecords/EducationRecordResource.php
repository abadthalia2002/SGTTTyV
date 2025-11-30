<?php

namespace App\Filament\Resources\EducationRecords;

use App\Filament\Resources\EducationRecords\Pages\CreateEducationRecord;
use App\Filament\Resources\EducationRecords\Pages\EditEducationRecord;
use App\Filament\Resources\EducationRecords\Pages\ListEducationRecords;
use App\Filament\Resources\EducationRecords\Pages\ViewEducationRecord;
use App\Filament\Resources\EducationRecords\Schemas\EducationRecordForm;
use App\Filament\Resources\EducationRecords\Schemas\EducationRecordInfolist;
use App\Filament\Resources\EducationRecords\Tables\EducationRecordsTable;
use App\Models\EducationRecord;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EducationRecordResource extends Resource
{
    protected static ?string $model = EducationRecord::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return EducationRecordForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return EducationRecordInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EducationRecordsTable::configure($table);
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
            'index' => ListEducationRecords::route('/'),
            'create' => CreateEducationRecord::route('/create'),
            'view' => ViewEducationRecord::route('/{record}'),
            'edit' => EditEducationRecord::route('/{record}/edit'),
        ];
    }
}
