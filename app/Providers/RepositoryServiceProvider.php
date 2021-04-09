<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $models = [
            'LandingPagePosition',
            'Products',
            'Agents',
            'Users',
            'News'
        ];

        foreach ($models as $model) {
            $this->app->bind(
                "App\\Repositories\\{$model}\\{$model}RepositoryInterface",
                "App\\Repositories\\{$model}\\{$model}Repository"
            );
        }
    }
}

