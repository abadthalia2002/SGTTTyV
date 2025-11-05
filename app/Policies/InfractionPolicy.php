<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Infraction;
use Illuminate\Auth\Access\HandlesAuthorization;

class InfractionPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Infraction');
    }

    public function view(AuthUser $authUser, Infraction $infraction): bool
    {
        return $authUser->can('View:Infraction');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Infraction');
    }

    public function update(AuthUser $authUser, Infraction $infraction): bool
    {
        return $authUser->can('Update:Infraction');
    }

    public function delete(AuthUser $authUser, Infraction $infraction): bool
    {
        return $authUser->can('Delete:Infraction');
    }

    public function restore(AuthUser $authUser, Infraction $infraction): bool
    {
        return $authUser->can('Restore:Infraction');
    }

    public function forceDelete(AuthUser $authUser, Infraction $infraction): bool
    {
        return $authUser->can('ForceDelete:Infraction');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Infraction');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Infraction');
    }

    public function replicate(AuthUser $authUser, Infraction $infraction): bool
    {
        return $authUser->can('Replicate:Infraction');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Infraction');
    }

}