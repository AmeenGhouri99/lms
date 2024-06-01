<?php

namespace App\Providers;

use App\Contracts\AcademicInformationContract;
use App\Contracts\AuthContract;
use App\Contracts\ChooseProgramContract;
use App\Contracts\DocumentContract;
use App\Contracts\PersonalInformationContract;
use App\Contracts\UserContract;
use App\Services\AcademicInformationService;
use App\Services\AuthService;
use App\Services\ChooseProgramService;
use App\Services\DocumentService;
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
        $this->app->bind(
            DocumentContract::class,
            function ($app) {
                return $app->make(DocumentService::class);
            }
        );
        $this->app->bind(
            ChooseProgramContract::class,
            function ($app) {
                return $app->make(ChooseProgramService::class);
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
