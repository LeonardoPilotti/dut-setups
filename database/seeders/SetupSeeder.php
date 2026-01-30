<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setup;
use App\Models\Track;
use App\Models\User;

class SetupSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        $tracks = Track::all();

        foreach ($tracks as $track) {

            // Setup seco
            Setup::create([
                'user_id' => $user->id,
                'owner_name' => 'Gabriel Quintino',
                'track_id' => $track->id,
                'is_wet' => false,
                'is_generic' => true,
                'title' => 'Setup seco - ' . $track->name,

                'front_wing' => 28.0,
                'rear_wing' => 26.0,
                'diff_on' => 55,
                'diff_off' => 50,

                'front_camber' => -2.50,
                'rear_camber' => -1.00,
                'front_toe' => 0.05,
                'rear_toe' => 0.20,

                'front_suspension' => 30,
                'rear_suspension' => 28,
                'front_anti_roll' => 10,
                'rear_anti_roll' => 8,

                'front_height' => 35.0,
                'rear_height' => 37.0,

                'brake_pressure' => 100.0,
                'brake_bias' => 54.0,

                'front_left_pressure' => 22.5,
                'front_right_pressure' => 22.5,
                'rear_left_pressure' => 20.5,
                'rear_right_pressure' => 20.5,
            ]);

            // Setup chuva
            Setup::create([
                'user_id' => $user->id,
                'owner_name' => 'Gabriel Chuvisco',
                'track_id' => $track->id,
                'is_wet' => true,
                'is_generic' => true,
                'title' => 'Setup chuva - ' . $track->name,

                'front_wing' => 35.0,
                'rear_wing' => 33.0,
                'diff_on' => 50,
                'diff_off' => 45,

                'front_camber' => -2.00,
                'rear_camber' => -0.80,
                'front_toe' => 0.08,
                'rear_toe' => 0.25,

                'front_suspension' => 26,
                'rear_suspension' => 24,
                'front_anti_roll' => 8,
                'rear_anti_roll' => 6,

                'front_height' => 38.0,
                'rear_height' => 40.0,

                'brake_pressure' => 98.0,
                'brake_bias' => 53.0,

                'front_left_pressure' => 23.0,
                'front_right_pressure' => 23.0,
                'rear_left_pressure' => 21.0,
                'rear_right_pressure' => 21.0,
            ]);
        }
    }
}
