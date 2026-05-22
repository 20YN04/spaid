<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('availabilities', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('psychologist_id')
                ->constrained('psychologists')
                ->restrictOnDelete();
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->boolean('is_booked')->default(false);
            $table->timestamps();

            $table->index(['psychologist_id', 'is_booked', 'start_time']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('availabilities');
    }
};
