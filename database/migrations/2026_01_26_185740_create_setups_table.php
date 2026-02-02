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

            $table->boolean('is_wet')->default(false);      // false = seco | true = chuva
            $table->boolean('is_generic')->default(false);  // false = privado | true = público

            $table->string('title');

            // Aerodinâmica (0-50, inteiro)
            $table->integer('front_wing');
            $table->integer('rear_wing');

            // Diferencial (10-100, inteiro)
            $table->integer('diff_on');
            $table->integer('diff_off');

            // Geometria (valores decimais)
            $table->decimal('front_camber', 4, 1);  // -3.5 a 2.5
            $table->decimal('rear_camber', 4, 1);   // -2.0 a -1.0
            $table->decimal('front_toe', 4, 2);     // 0.00 a 0.20
            $table->decimal('rear_toe', 4, 2);      // 0.10 a 0.25

            // Suspensão (inteiros)
            $table->integer('front_suspension');     // 1-41
            $table->integer('rear_suspension');      // 1-41
            $table->integer('front_anti_roll');      // 1-21
            $table->integer('rear_anti_roll');       // 1-21

            // Altura (inteiros)
            $table->integer('front_height');         // 15-35
            $table->integer('rear_height');          // 40-60

            // Freio (inteiros)
            $table->integer('brake_pressure');       // 80-100
            $table->integer('brake_bias');           // 50-70

            // Pneus (valores decimais)
            $table->decimal('front_left_pressure', 4, 1);   // 22.5-29.5
            $table->decimal('front_right_pressure', 4, 1);  // 22.5-29.5
            $table->decimal('rear_left_pressure', 4, 1);    // 20.5-26.5
            $table->decimal('rear_right_pressure', 4, 1);   // 20.5-26.5

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('setups');
    }
};