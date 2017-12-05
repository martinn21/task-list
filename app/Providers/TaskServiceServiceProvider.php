<?php
namespace App\Providers;

use App\Services\Task\TaskService;
use Illuminate\Support\ServiceProvider;

class TaskServiceServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\Contracts\TaskServiceInterface', function($app) {
            $taskValidator = $app->make('App\Validators\Task\TaskValidator');
            $taskRepository = $app->make('App\Repositories\Task\TaskRepository');
            return new TaskService($taskValidator, $taskRepository);
        });
    }
}