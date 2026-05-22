<?php

namespace App\Filament\Admin\Resources\TriageResults\Pages;

use App\Filament\Admin\Resources\TriageResults\TriageResultResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTriageResults extends ListRecords
{
    protected static string $resource = TriageResultResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
