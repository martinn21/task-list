<?php
namespace App\Providers;

use App\Http\Controllers\Task\TaskController;
use Illuminate\Support\ServiceProvider;

class TaskControllerServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        $app->bind('App\Http\Controllers\Task\TaskController', function($app) {
            $taskService = $app->make('App\Services\Task\TaskService');
            return new TaskController($taskService);
        });
    }
}