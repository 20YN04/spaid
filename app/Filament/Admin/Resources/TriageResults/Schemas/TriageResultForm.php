<?php

namespace App\Filament\Admin\Resources\TriageResults\Schemas;

use App\Enums\IssueType;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TriageResultForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Select::make('issue_type')
                    ->options(IssueType::class)
                    ->required(),
                Toggle::make('takes_medication')
                    ->required(),
                Toggle::make('currently_in_treatment')
                    ->required(),
            ]);
    }
}
