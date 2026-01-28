<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setup extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'owner_name',
        'track_id',
        'is_wet',
        'front_wing',
        'rear_wing',
        'diff_on',
        'diff_off',
        'front_camber',
        'rear_camber',
        'front_toe',
        'rear_toe',
        'front_suspension',
        'rear_suspension',
        'front_anti_roll',
        'rear_anti_roll',
        'front_height',
        'rear_height',
        'brake_pressure',
        'brake_bias',
        'front_right_pressure',
        'front_left_pressure',
        'rear_right_pressure',
        'rear_left_pressure',
    ];

    // Apenas UMA relação com usuário (escolha uma)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Se quiser usar 'owner' como alias
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

       public function track()
    {
        return $this->belongsTo(Track::class);
    }
}
