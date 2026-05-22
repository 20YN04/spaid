<?php

namespace App\Filament\Admin\Resources\Psychologists;

use App\Filament\Admin\Resources\Psychologists\Pages\CreatePsychologist;
use App\Filament\Admin\Resources\Psychologists\Pages\EditPsychologist;
use App\Filament\Admin\Resources\Psychologists\Pages\ListPsychologists;
use App\Filament\Admin\Resources\Psychologists\Schemas\PsychologistForm;
use App\Filament\Admin\Resources\Psychologists\Tables\PsychologistsTable;
use App\Models\Psychologist;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PsychologistResource extends Resource
{
    protected static ?string $model = Psychologist::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PsychologistForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PsychologistsTable::configure($table);
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
            'index' => ListPsychologists::route('/'),
            'create' => CreatePsychologist::route('/create'),
            'edit' => EditPsychologist::route('/{record}/edit'),
        ];
    }
}
