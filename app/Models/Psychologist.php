<?php

namespace App\Models;

use App\Enums\IssueType;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'email', 'specialties'])]
class Psychologist extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'specialties' => 'array',
        ];
    }

    public function availabilities(): HasMany
    {
        return $this->hasMany(Availability::class);
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function handlesIssue(IssueType $issue): bool
    {
        return in_array($issue->value, $this->specialties ?? [], true);
    }
}
