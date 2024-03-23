<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SliderPolicy
{
    use HandlesAuthorization;

    public function view(User $user): bool
    {
        return $user->can('slider_view');
    }

    public function create(User $user): bool
    {
        return $user->can('slider_create');
    }

    public function update(User $user): bool
    {
        return $user->can('slider_update');
    }

    public function delete(User $user): bool
    {
        return $user->can('slider_delete');
    }

}
