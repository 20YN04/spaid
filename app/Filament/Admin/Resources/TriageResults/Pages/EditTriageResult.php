<?php

namespace App\Filament\Admin\Resources\TriageResults\Pages;

use App\Filament\Admin\Resources\TriageResults\TriageResultResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTriageResult extends EditRecord
{
    protected static string $resource = TriageResultResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
