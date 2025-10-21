<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\TransportAssociation;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransportAssociationPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:TransportAssociation');
    }

    public function view(AuthUser $authUser, TransportAssociation $transportAssociation): bool
    {
        return $authUser->can('View:TransportAssociation');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:TransportAssociation');
    }

    public function update(AuthUser $authUser, TransportAssociation $transportAssociation): bool
    {
        return $authUser->can('Update:TransportAssociation');
    }

    public function delete(AuthUser $authUser, TransportAssociation $transportAssociation): bool
    {
        return $authUser->can('Delete:TransportAssociation');
    }

    public function restore(AuthUser $authUser, TransportAssociation $transportAssociation): bool
    {
        return $authUser->can('Restore:TransportAssociation');
    }

    public function forceDelete(AuthUser $authUser, TransportAssociation $transportAssociation): bool
    {
        return $authUser->can('ForceDelete:TransportAssociation');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:TransportAssociation');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:TransportAssociation');
    }

    public function replicate(AuthUser $authUser, TransportAssociation $transportAssociation): bool
    {
        return $authUser->can('Replicate:TransportAssociation');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:TransportAssociation');
    }

}