<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Setup;
use Illuminate\Auth\Access\HandlesAuthorization;

class SetupPolicy
{
    use HandlesAuthorization;

  public function view(User $user, Setup $setup)
{
    // 1️ Admin vê tudo
    if ($user->isAdmin()) {
        return true;
    }

    // Team vê setups privados 
    if ($user->role === 'team' && $setup->is_generic === false) {
        return true;
    }

    // 3User vê apenas setups genéricos
    if ($user->role === 'user' && $setup->is_generic === true) {
        return true;
    }

    // Caso contrário, não vê
    return false;
}



    public function create(User $user)
    {
        // Apenas admins podem criar setups
        return $user->isAdmin();
    }

    public function update(User $user, Setup $setup)
    {
        return $user->isAdmin() || $user->id === $setup->user_id;
    }

    public function delete(User $user, Setup $setup)
    {
        return $user->isAdmin();
    }
}
