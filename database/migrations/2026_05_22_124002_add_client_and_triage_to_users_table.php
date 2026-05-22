<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->foreignId('client_id')
                ->nullable()
                ->after('id')
                ->constrained('clients')
                ->restrictOnDelete();

            $table->boolean('triage_completed')->default(false)->after('email_verified_at');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->dropForeign(['client_id']);
            $table->dropColumn(['client_id', 'triage_completed']);
        });
    }
};
