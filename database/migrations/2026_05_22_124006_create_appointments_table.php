<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->restrictOnDelete();
            $table->foreignId('psychologist_id')
                ->constrained('psychologists')
                ->restrictOnDelete();
            $table->foreignId('availability_id')
                ->unique()
                ->constrained('availabilities')
                ->restrictOnDelete();
            $table->dateTime('scheduled_at');
            $table->enum('status', ['scheduled', 'completed', 'cancelled'])->default('scheduled');
            $table->timestamps();

            $table->index(['user_id', 'status']);
            $table->index(['psychologist_id', 'scheduled_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
