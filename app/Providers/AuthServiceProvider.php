<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Currency' => 'App\Policies\CurrenciesPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function (User $user) {
            return $user->getAttribute('is_admin');
        });
        Gate::define('create', 'App\Policies\CurrenciesPolicy@create');
        Gate::define('edit', 'App\Policies\CurrenciesPolicy@update');
        Gate::define('delete', 'App\Policies\CurrenciesPolicy@delete');
    }
}
