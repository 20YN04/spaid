<?php

namespace App\Enums;

enum IssueType: string
{
    case Adhd = 'adhd';
    case Autisme = 'autisme';
    case AngstStress = 'angst_stress';
    case Dyslexie = 'dyslexie';
    case Dyscalculie = 'dyscalculie';

    public function label(): string
    {
        return match ($this) {
            self::Adhd => 'ADHD',
            self::Autisme => 'Autisme',
            self::AngstStress => 'Angst/Stress',
            self::Dyslexie => 'Dyslexie',
            self::Dyscalculie => 'Dyscalculie',
        };
    }

    public function programRoute(): string
    {
        return match ($this) {
            self::Adhd => '/programmas/adhd',
            self::Autisme => '/programmas/autisme',
            self::AngstStress => '/programmas/angst',
            self::Dyslexie => '/programmas/dyslexie',
            self::Dyscalculie => '/programmas/dyscalculie',
        };
    }
}
