<?php

namespace App\Filament\Admin\Resources\Psychologists\Pages;

use App\Filament\Admin\Resources\Psychologists\PsychologistResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPsychologist extends EditRecord
{
    protected static string $resource = PsychologistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
