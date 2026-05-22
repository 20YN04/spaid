<?php

namespace App\Filament\Admin\Resources\Appointments\Schemas;

use App\Enums\AppointmentStatus;
use App\Models\Availability;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class AppointmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('Patient')
                    ->relationship(
                        name: 'user',
                        titleAttribute: 'name',
                    )
                    ->getOptionLabelFromRecordUsing(fn ($record) => "{$record->name} ({$record->email})")
                    ->searchable(['name', 'email'])
                    ->preload()
                    ->required(),

                Select::make('psychologist_id')
                    ->label('Psychologist')
                    ->relationship('psychologist', 'name')
                    ->searchable(['name', 'email'])
                    ->preload()
                    ->required(),

                Select::make('availability_id')
                    ->label('Availability slot')
                    ->options(function () {
                        return Availability::query()
                            ->with('psychologist:id,name')
                            ->orderBy('start_time')
                            ->get()
                            ->mapWithKeys(fn (Availability $a) => [
                                $a->id => sprintf(
                                    '%s — %s%s',
                                    $a->psychologist?->name ?? '—',
                                    $a->start_time->format('Y-m-d H:i'),
                                    $a->is_booked ? ' (booked)' : '',
                                ),
                            ])
                            ->all();
                    })
                    ->searchable()
                    ->required(),

                DateTimePicker::make('scheduled_at')
                    ->seconds(false)
                    ->required(),

                Select::make('status')
                    ->options(collect(AppointmentStatus::cases())
                        ->mapWithKeys(fn (AppointmentStatus $s) => [$s->value => ucfirst($s->value)])
                        ->all())
                    ->default(AppointmentStatus::Scheduled->value)
                    ->required(),
            ]);
    }
}
