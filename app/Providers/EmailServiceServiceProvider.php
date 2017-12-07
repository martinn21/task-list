<?php
namespace App\Providers;

use App\Services\Email\EmailService;
use Illuminate\Support\ServiceProvider;

class EmailServiceServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\Contracts\EmailServiceInterface', function ($app){
            $mailer = $app->make('Illuminate\Mail\Mailer');
            return new EmailService($mailer);
        });
    }
}