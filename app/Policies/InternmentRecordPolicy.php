<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\InternmentRecord;
use Illuminate\Auth\Access\HandlesAuthorization;

class InternmentRecordPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:InternmentRecord');
    }

    public function view(AuthUser $authUser, InternmentRecord $internmentRecord): bool
    {
        return $authUser->can('View:InternmentRecord');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:InternmentRecord');
    }

    public function update(AuthUser $authUser, InternmentRecord $internmentRecord): bool
    {
        return $authUser->can('Update:InternmentRecord');
    }

    public function delete(AuthUser $authUser, InternmentRecord $internmentRecord): bool
    {
        return $authUser->can('Delete:InternmentRecord');
    }

    public function restore(AuthUser $authUser, InternmentRecord $internmentRecord): bool
    {
        return $authUser->can('Restore:InternmentRecord');
    }

    public function forceDelete(AuthUser $authUser, InternmentRecord $internmentRecord): bool
    {
        return $authUser->can('ForceDelete:InternmentRecord');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:InternmentRecord');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:InternmentRecord');
    }

    public function replicate(AuthUser $authUser, InternmentRecord $internmentRecord): bool
    {
        return $authUser->can('Replicate:InternmentRecord');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:InternmentRecord');
    }

}