<?php
namespace App\Policies;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
class MemberPolicy
{
    use HandlesAuthorization;
    public function viewMembers(User $user)
    {
        // Allow users with role 'project_leader' to view members
        return $user->role === 'project_leader';
    }
    
}
