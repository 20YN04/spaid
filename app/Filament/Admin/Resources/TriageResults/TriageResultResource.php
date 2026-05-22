<?php

namespace App\Filament\Admin\Resources\TriageResults;

use App\Filament\Admin\Resources\TriageResults\Pages\CreateTriageResult;
use App\Filament\Admin\Resources\TriageResults\Pages\EditTriageResult;
use App\Filament\Admin\Resources\TriageResults\Pages\ListTriageResults;
use App\Filament\Admin\Resources\TriageResults\Schemas\TriageResultForm;
use App\Filament\Admin\Resources\TriageResults\Tables\TriageResultsTable;
use App\Models\TriageResult;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TriageResultResource extends Resource
{
    protected static ?string $model = TriageResult::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return TriageResultForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TriageResultsTable::configure($table);
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
            'index' => ListTriageResults::route('/'),
            'create' => CreateTriageResult::route('/create'),
            'edit' => EditTriageResult::route('/{record}/edit'),
        ];
    }
}
