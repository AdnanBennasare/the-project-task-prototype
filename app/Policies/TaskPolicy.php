<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;


class TaskPolicy
{
    use HandlesAuthorization;

    
    public function create(User $user)
{
    return $user->role === 'project_leader';
}

public function update(User $user)
{
    return $user->role === 'project_leader';
}

public function destroy(User $user)
{
    return $user->role === 'project_leader';
}


public function export(User $user) {
    return $user->role === 'project_leader';
}

public function import(User $user) {
    return $user->role === 'project_leader';
}


  

}
