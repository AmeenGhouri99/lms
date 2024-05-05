<?php

namespace App\Providers;

use App\Contracts\AcademicInformationContract;
use App\Contracts\AuthContract;
use App\Contracts\PersonalInformationContract;
use App\Contracts\UserContract;
use App\Services\AcademicInformationService;
use App\Services\AuthService;
use App\Services\PersonalInformationService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class UniversityServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            UserContract::class,
            function ($app) {
                return $app->make(UserService::class);
            }
        );
        $this->app->bind(
            PersonalInformationContract::class,
            function ($app) {
                return $app->make(PersonalInformationService::class);
            }
        );
        $this->app->bind(
            AcademicInformationContract::class,
            function ($app) {
                return $app->make(AcademicInformationService::class);
            }
        );
        $this->app->bind(
            AuthContract::class,
            function ($app) {
                return $app->make(AuthService::class);
            }
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
