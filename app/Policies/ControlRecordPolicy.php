<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ControlRecord;
use Illuminate\Auth\Access\HandlesAuthorization;

class ControlRecordPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ControlRecord');
    }

    public function view(AuthUser $authUser, ControlRecord $controlRecord): bool
    {
        return $authUser->can('View:ControlRecord');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ControlRecord');
    }

    public function update(AuthUser $authUser, ControlRecord $controlRecord): bool
    {
        return $authUser->can('Update:ControlRecord');
    }

    public function delete(AuthUser $authUser, ControlRecord $controlRecord): bool
    {
        return $authUser->can('Delete:ControlRecord');
    }

    public function restore(AuthUser $authUser, ControlRecord $controlRecord): bool
    {
        return $authUser->can('Restore:ControlRecord');
    }

    public function forceDelete(AuthUser $authUser, ControlRecord $controlRecord): bool
    {
        return $authUser->can('ForceDelete:ControlRecord');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ControlRecord');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ControlRecord');
    }

    public function replicate(AuthUser $authUser, ControlRecord $controlRecord): bool
    {
        return $authUser->can('Replicate:ControlRecord');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ControlRecord');
    }

}