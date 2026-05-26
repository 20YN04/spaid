<?php

namespace App\Actions\Fortify;

use App\Models\Client;
use App\Models\User;
use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     *
     * @throws ValidationException
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
                $this->emailDomainAllowed(),
            ],
        ])->validateWithBag('updateProfileInformation');

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
            ])->save();
        }
    }

    protected function emailDomainAllowed(): Closure
    {
        return function (string $attribute, mixed $value, Closure $fail): void {
            if (! is_string($value) || ! str_contains($value, '@')) {
                $fail('Invalid email address.');

                return;
            }

            $domain = '@' . strtolower(substr(strrchr($value, '@'), 1));

            $allowed = Client::query()
                ->whereRaw('LOWER(allowed_domain) = ?', [$domain])
                ->exists();

            if (! $allowed) {
                $fail('Registration is restricted to authorized corporate email domains.');
            }
        };
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
