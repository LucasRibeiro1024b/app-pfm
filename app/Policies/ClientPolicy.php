<?php

namespace App\Policies;

use App\Models\Client;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ClientPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Client $client): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return ($user->type == 0 || 
                $user->type == 1);
    }

    // editar clientes (sócio e consultor)
    public function update(User $user): bool
    {
        return ($user->type == 0 || 
                $user->type == 1);
    }

    public function delete(User $user): bool
    {
        return ($user->type == 0 || 
                $user->type == 1);
    }

    //quem vê a coluna "ações" (talvez eu mude)
    public function action(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Client $client): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Client $client): bool
    {
        return false;
    }
}
