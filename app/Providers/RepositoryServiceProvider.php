<?php

namespace App\Providers;

use App\Http\Interfaces\SystemAnswerInterface;
use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Http\Repositories\Api\AuthInterface',
            'App\Http\Repositories\Api\AuthService'
        );

        $this->app->bind(
            'App\Http\Repositories\Api\CustomerInterface',
            'App\Http\Repositories\Api\CustomerService'
        );

        $this->app->bind(
            'App\Http\Repositories\Api\ReviewInterface',
            'App\Http\Repositories\Api\ReviewService'
        );

        $this->app->bind(
            'App\Http\Repositories\Web\AdminInterface',
            'App\Http\Repositories\Web\AdminService'
        );

        $this->app->bind(
            'App\Http\Repositories\Web\MovieInterface',
            'App\Http\Repositories\Web\MovieService',
        );

        $this->app->bind(
            'App\Http\Repositories\Web\CategoryInterface',
            'App\Http\Repositories\Web\CategoryService',
        );

        $this->app->bind(
            'App\Http\Repositories\Web\ReviewInterface',
            'App\Http\Repositories\Web\ReviewService',
        );

        $this->app->bind(
            'App\Http\Repositories\Web\RoleInterface',
            'App\Http\Repositories\Web\RoleService',
        );

        $this->app->bind(
            'App\Http\Repositories\Web\PermissionInterface',
            'App\Http\Repositories\Web\PermissionService',
        );


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
