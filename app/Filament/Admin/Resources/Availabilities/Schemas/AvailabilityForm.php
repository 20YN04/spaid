<?php

namespace App\Filament\Admin\Resources\Availabilities\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AvailabilityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('psychologist_id')
                    ->relationship('psychologist', 'name')
                    ->required(),
                DateTimePicker::make('start_time')
                    ->required(),
                DateTimePicker::make('end_time')
                    ->required(),
                Toggle::make('is_booked')
                    ->required(),
            ]);
    }
}
