<?php

namespace Database\Seeders;

use App\Enums\IssueType;
use App\Models\Psychologist;
use Illuminate\Database\Seeder;

class PsychologistSeeder extends Seeder
{
    public function run(): void
    {
        $psychologists = [
            [
                'name' => 'Dr. Lien Vermeulen',
                'email' => 'lien.vermeulen@spaid.be',
                'specialties' => [IssueType::Adhd->value, IssueType::AngstStress->value],
            ],
            [
                'name' => 'Dr. Mathias Janssens',
                'email' => 'mathias.janssens@spaid.be',
                'specialties' => [IssueType::Autisme->value, IssueType::Adhd->value],
            ],
            [
                'name' => 'Dr. Saskia De Wilde',
                'email' => 'saskia.dewilde@spaid.be',
                'specialties' => [IssueType::Dyslexie->value, IssueType::Dyscalculie->value],
            ],
            [
                'name' => 'Dr. Pieter Maes',
                'email' => 'pieter.maes@spaid.be',
                'specialties' => [IssueType::AngstStress->value, IssueType::Autisme->value],
            ],
            [
                'name' => 'Dr. Naïma El Amrani',
                'email' => 'naima.elamrani@spaid.be',
                'specialties' => [
                    IssueType::Adhd->value,
                    IssueType::Dyslexie->value,
                    IssueType::Dyscalculie->value,
                ],
            ],
        ];

        foreach ($psychologists as $row) {
            Psychologist::updateOrCreate(
                ['email' => $row['email']],
                [
                    'name' => $row['name'],
                    'specialties' => $row['specialties'],
                ],
            );
        }
    }
}
