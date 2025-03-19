<?php

namespace App\Policies;

use App\Constants\UserRoles;
use App\Models\User;

class ExpensePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function create(User $user): bool
    {
        return ($user->type == UserRoles::PARTNER || 
                $user->type == UserRoles::FINANCIER);
    }

    // editar clientes (sócio e consultor)
    public function update(User $user): bool
    {
        return ($user->type == UserRoles::PARTNER || 
                $user->type == UserRoles::FINANCIER);
    }

    public function delete(User $user): bool
    {
        return ($user->type == UserRoles::PARTNER || 
                $user->type == UserRoles::FINANCIER);
    }

    //quem vê a coluna "ações"
    public function action(User $user): bool
    {
        return ($user->type == UserRoles::PARTNER || 
                $user->type == UserRoles::FINANCIER);
    }

    public function censored(User $user): bool
    {
        return true;
    }
}
