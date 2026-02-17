<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements CanResetPasswordContract
{
    use CanResetPassword, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    public function isTeamMember(): bool
    {
        return $this->role === 'team';
    }

    public function isUser(): bool
    {
        return $this->role ==='user';
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function setups()
    {
        return $this->hasMany(Setup::class);
    }

    // Relação com setups favoritados
    public function favoriteSetups()
    {
        return $this->belongsToMany(Setup::class, 'favorites')->withTimestamps();
    }

    // Adicionar favorito
    public function favoriteSetup($setupId)
    {
        if (! $this->favoriteSetups()->where('setup_id', $setupId)->exists()) {
            $this->favoriteSetups()->attach($setupId);
        }
    }

    // Remover favorito
    public function unfavoriteSetup($setupId)
    {
        $this->favoriteSetups()->detach($setupId);
    }

    // Toggle favorito
    public function toggleFavoriteSetup($setupId)
    {
        if ($this->favoriteSetups()->where('setup_id', $setupId)->exists()) {
            $this->unfavoriteSetup($setupId);

            return false;
        } else {
            $this->favoriteSetup($setupId);

            return true;
        }
    }
}
