<?php

namespace App\Actions\Fortify;

use App\Models\Client;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * @param  array<string, string>  $input
     *
     * @throws ValidationException
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
                $this->emailDomainAllowed(),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        $client = $this->resolveClientForEmail($input['email']);

        return User::create([
            'client_id' => $client->id,
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }

    protected function emailDomainAllowed(): Closure
    {
        return function (string $attribute, mixed $value, Closure $fail): void {
            if (! is_string($value) || ! str_contains($value, '@')) {
                $fail('Invalid email address.');

                return;
            }

            if ($this->resolveClientForEmail($value) === null) {
                $fail('Registration is restricted to authorized corporate email domains.');
            }
        };
    }

    protected function resolveClientForEmail(string $email): ?Client
    {
        $domain = '@' . strtolower(substr(strrchr($email, '@'), 1));

        return Client::query()
            ->whereRaw('LOWER(allowed_domain) = ?', [$domain])
            ->first();
    }
}
