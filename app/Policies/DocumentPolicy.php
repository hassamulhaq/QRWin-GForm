<?php

namespace App\Policies;

use App\Models\Document;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Document $document): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Document $document): bool
    {
    }

    public function delete(User $user, Document $document): bool
    {
    }

    public function restore(User $user, Document $document): bool
    {
    }

    public function forceDelete(User $user, Document $document): bool
    {
    }
}
