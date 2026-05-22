<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $client = Client::query()
            ->where('allowed_domain', '@ynarchive.com')
            ->first();

        $email = env('ADMIN_SEED_EMAIL', 'admin@ynarchive.com');
        $password = env('ADMIN_SEED_PASSWORD', 'password');

        User::updateOrCreate(
            ['email' => $email],
            [
                'client_id' => $client?->id,
                'name' => 'Spaid Admin',
                'password' => Hash::make($password),
                'email_verified_at' => now(),
                'triage_completed' => true,
            ],
        );
    }
}
