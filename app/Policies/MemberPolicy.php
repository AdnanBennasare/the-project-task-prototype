<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;


class MemberPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
{
    return $user->role === 'project_leader';
}
    public function create(User $user)
{
    return $user->role === 'project_leader';
}




public function view(User $user)
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
