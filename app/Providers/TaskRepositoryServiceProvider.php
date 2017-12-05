<?php
namespace App\Providers;

use App\Models\Task;
use App\Repositories\Task\TaskRepository;
use Illuminate\Support\ServiceProvider;

class TaskRepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Contracts\TaskRepositoryInterface', function($app) {
            $task = new Task();
            return new TaskRepository($task);
        });
    }
}