<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Task;

class TaskPolicy
{
    public function export(User $user)
    {
        return $user->role === 'project_leader';
    }
    public function import(User $user)
    {
        return $user->role === 'project_leader';
    }
    public function create(User $user)
    {
        return $user->role === 'project_leader';
    }
    
    public function store(User $user)
    {
        return $user->role === 'project_leader';
    }
    
    public function update(User $user)
    {
        return $user->role === 'project_leader';
    }
    
    public function delete(User $user)
    {
        return $user->role === 'project_leader';
    }
    
      
    public function destroy(User $user)
    {
        return $user->role === 'project_leader';
    }
    public function edit(User $user)
    {
        return $user->role === 'project_leader';
    }
}
