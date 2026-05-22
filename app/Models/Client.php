<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'allowed_domain'])]
class Client extends Model
{
    use HasFactory;

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function matchesEmail(string $email): bool
    {
        $domain = ltrim($this->allowed_domain, '@');

        return str_ends_with(strtolower($email), '@' . strtolower($domain));
    }
}
