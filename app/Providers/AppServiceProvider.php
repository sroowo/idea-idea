<?php

namespace App\Providers;
use App\Models\User;

use Gate;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define("view-admin", function (User $user) {
            if($user->id==1){
                return true;
            }
            return Response::denyAsNotFound();
        });
    }
}
