<?php

namespace App\Policies;

use App\Models\User;

class CategoryPolicy
{
    /**
     * Create a new policy instance.
     */
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return ($user->type == 0 || 
                $user->type == 2);
    }

    // editar clientes (sócio e consultor)
    public function update(User $user): bool
    {
        return ($user->type == 0 || 
                $user->type == 2);
    }

    public function delete(User $user): bool
    {
        return ($user->type == 0 || 
                $user->type == 2);
    }

    //quem vê a coluna "ações" (talvez seja mudado)
    public function action(User $user): bool
    {
        return ($user->type == 0 || 
                $user->type == 2);
    }

    public function censored(User $user): bool
    {
        return true;
    }
}
