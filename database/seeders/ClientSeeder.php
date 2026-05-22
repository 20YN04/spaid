<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $clients = [
            ['name' => 'DKV Belgium',             'allowed_domain' => '@dkv.be'],
            ['name' => 'Elias Group',             'allowed_domain' => '@elias.be'],
            ['name' => 'Federal Government (Be)', 'allowed_domain' => '@min.fed.be'],
            ['name' => 'Spaid (internal)',        'allowed_domain' => '@spaid.be'],
            ['name' => 'Ynarchive Studio',        'allowed_domain' => '@ynarchive.com'],
        ];

        foreach ($clients as $row) {
            Client::updateOrCreate(
                ['allowed_domain' => $row['allowed_domain']],
                ['name' => $row['name']],
            );
        }
    }
}
