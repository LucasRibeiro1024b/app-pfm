<?php

namespace App\Policies;

use App\Constants\UserRoles;
use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProjectPolicy
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
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return ($user->type == UserRoles::PARTNER || 
                $user->type == UserRoles::CONSULTANT);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return ($user->type == UserRoles::PARTNER || 
                $user->type == UserRoles::CONSULTANT);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return ($user->type == UserRoles::PARTNER || 
                $user->type == UserRoles::CONSULTANT);
    }

}
