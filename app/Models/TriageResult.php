<?php

namespace App\Models;

use App\Enums\IssueType;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['user_id', 'issue_type', 'takes_medication', 'currently_in_treatment'])]
class TriageResult extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'issue_type' => IssueType::class,
            'takes_medication' => 'boolean',
            'currently_in_treatment' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
