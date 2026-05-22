<?php

namespace App\Filament\Admin\Resources\Appointments\Tables;

use App\Enums\AppointmentStatus;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class AppointmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Patient')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('user.email')
                    ->label('Email')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('psychologist.name')
                    ->label('Psychologist')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('availability.start_time')
                    ->label('Slot')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
                TextColumn::make('scheduled_at')
                    ->label('Scheduled')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
                SelectColumn::make('status')
                    ->options(collect(AppointmentStatus::cases())
                        ->mapWithKeys(fn (AppointmentStatus $s) => [$s->value => ucfirst($s->value)])
                        ->all())
                    ->selectablePlaceholder(false)
                    ->rules(['required'])
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(collect(AppointmentStatus::cases())
                        ->mapWithKeys(fn (AppointmentStatus $s) => [$s->value => ucfirst($s->value)])
                        ->all()),
                SelectFilter::make('psychologist')
                    ->relationship('psychologist', 'name')
                    ->searchable()
                    ->preload(),
            ])
            ->defaultSort('scheduled_at', 'desc')
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
