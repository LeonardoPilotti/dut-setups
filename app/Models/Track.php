<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $fillable = [
        'name',
        'country',
        'slug',
    ];

    public function setups()
    {
        return $this->hasMany(Setup::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
