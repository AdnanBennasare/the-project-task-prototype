<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use App\Policies\TaskPolicy;
use App\Policies\MemberPolicy;
use App\Policies\ProjectPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    // protected $policies = [
    //     //
    // ];

    protected $policies = [
        // 'App\Models\User' => 'App\Policies\MemberPolicy',
        User::class => MemberPolicy::class,
        Project::class => ProjectPolicy::class,
        Task::class => TaskPolicy::class
    ];
    
    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
