<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\EducationRecord;
use Illuminate\Auth\Access\HandlesAuthorization;

class EducationRecordPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:EducationRecord');
    }

    public function view(AuthUser $authUser, EducationRecord $educationRecord): bool
    {
        return $authUser->can('View:EducationRecord');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:EducationRecord');
    }

    public function update(AuthUser $authUser, EducationRecord $educationRecord): bool
    {
        return $authUser->can('Update:EducationRecord');
    }

    public function delete(AuthUser $authUser, EducationRecord $educationRecord): bool
    {
        return $authUser->can('Delete:EducationRecord');
    }

    public function restore(AuthUser $authUser, EducationRecord $educationRecord): bool
    {
        return $authUser->can('Restore:EducationRecord');
    }

    public function forceDelete(AuthUser $authUser, EducationRecord $educationRecord): bool
    {
        return $authUser->can('ForceDelete:EducationRecord');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:EducationRecord');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:EducationRecord');
    }

    public function replicate(AuthUser $authUser, EducationRecord $educationRecord): bool
    {
        return $authUser->can('Replicate:EducationRecord');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:EducationRecord');
    }

}