<?php

namespace App\Providers;
<<<<<<< HEAD
use App\Models\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;
=======

use Laravel\Passport\Passport;
>>>>>>> 537cd46524d66fae9e7152023001d5763addfcf9
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
<<<<<<< HEAD
        
=======
        Passport::routes();
>>>>>>> 537cd46524d66fae9e7152023001d5763addfcf9
        //
    }
}
