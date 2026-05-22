<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('triage_results', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->enum('issue_type', ['adhd', 'autisme', 'angst_stress', 'dyslexie', 'dyscalculie']);
            $table->boolean('takes_medication')->default(false);
            $table->boolean('currently_in_treatment')->default(false);
            $table->timestamps();

            $table->index('issue_type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('triage_results');
    }
};
