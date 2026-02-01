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
        // Apenas admins ou dono do setup podem ver
        return $user->isAdmin() || $user->id === $setup->user_id;
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
