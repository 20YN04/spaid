<?php

namespace App\Filament\Admin\Resources\Psychologists\Pages;

use App\Filament\Admin\Resources\Psychologists\PsychologistResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePsychologist extends CreateRecord
{
    protected static string $resource = PsychologistResource::class;
}
