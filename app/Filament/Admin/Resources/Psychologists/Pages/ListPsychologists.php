<?php

namespace App\Filament\Admin\Resources\Psychologists\Pages;

use App\Filament\Admin\Resources\Psychologists\PsychologistResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPsychologists extends ListRecords
{
    protected static string $resource = PsychologistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
