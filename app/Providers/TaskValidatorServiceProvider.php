<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TaskValidatorServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Validators\Contracts\ValidatorInterface', 'App\Validators\Task\TaskValidator');
    }
}