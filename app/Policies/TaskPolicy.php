<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TaskPolicy
{
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
    public function view(User $user): bool
    {
        return ($user->type == 0 || 
                $user->type == 1 || 
                $user->type == 3);
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
                $user->type == 1 || 
                $user->type == 3);
    }

    public function delete(User $user): bool
    {
        return ($user->type == 0 || 
                $user->type == 1);
    }

    // finalizar tarefa
    public function end(User $user): bool
    {
        return ($user->type == 0 || 
                $user->type == 1);
    }

    //financeiro não vê a coluna "ações"
    public function action(User $user): bool
    {
        return !($user->type == 2);
    }

}
