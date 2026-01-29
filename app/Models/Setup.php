<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setup extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',   
        'owner_name',    
        'user_id',
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

    // Relação com o usuário
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relação com o criador do setup
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function track()
    {
        return $this->belongsTo(Track::class);
    }
}
