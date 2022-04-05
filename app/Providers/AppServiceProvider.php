<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        VerifyEmail::toMailUsing(function ($notifiable) {
        
            $verifyUrl = URL::temporarySignedRoute(
                'verification.verify', Carbon::now()->addMinutes(60), [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification())
                ]
            );
            
            $vars = [
                'url' => $verifyUrl
            ];
    
            return (new MailMessage)->subject($verifyUrl);
        });
    }
}
