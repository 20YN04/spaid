<?php

namespace App\Enums;

enum IssueType: string
{
    case Adhd = 'adhd';
    case Autisme = 'autisme';
    case AngstStress = 'angst_stress';
    case Dyslexie = 'dyslexie';
    case Dyscalculie = 'dyscalculie';

    /**
     * Locale-aware label, resolved via lang/{locale}.json.
     */
    public function label(): string
    {
        return __($this->translationKey());
    }

    public function translationKey(): string
    {
        return match ($this) {
            self::Adhd => 'ADHD',
            self::Autisme => 'Autism',
            self::AngstStress => 'Anxiety/Stress',
            self::Dyslexie => 'Dyslexia',
            self::Dyscalculie => 'Dyscalculia',
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
