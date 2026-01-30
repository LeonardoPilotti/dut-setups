<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('setups', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('owner_name')->nullable();
            $table->foreignId('track_id')->constrained()->cascadeOnDelete();

            $table->boolean('is_wet')->default(false); // false = seco | true = chuva

            // Visibilidade
            $table->boolean('is_generic')->default(false);

            $table->string('title');

            // Aerodinâmica
            $table->decimal('front_wing', 4, 1);
            $table->decimal('rear_wing', 4, 1);

            // Diferencial
            $table->integer('diff_on');
            $table->integer('diff_off');

            // Geometria
            $table->decimal('front_camber', 5, 2);
            $table->decimal('rear_camber', 5, 2);
            $table->decimal('front_toe', 5, 2);
            $table->decimal('rear_toe', 5, 2);

            // Suspensão
            $table->integer('front_suspension');
            $table->integer('rear_suspension');
            $table->integer('front_anti_roll');
            $table->integer('rear_anti_roll');

            // Altura
            $table->decimal('front_height', 5, 2);
            $table->decimal('rear_height', 5, 2);

            // Freio
            $table->decimal('brake_pressure', 4, 1);
            $table->decimal('brake_bias', 4, 1);

            // Pneus
            $table->decimal('front_left_pressure', 4, 2);
            $table->decimal('front_right_pressure', 4, 2);
            $table->decimal('rear_left_pressure', 4, 2);
            $table->decimal('rear_right_pressure', 4, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('setups');
    }
};
