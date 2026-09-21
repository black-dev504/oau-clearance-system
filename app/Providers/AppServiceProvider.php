<?php

namespace App\Providers;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\Failed;
use App\Listeners\LogAuthenticationEvents;
use App\Models\User;
use App\Observers\UserObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Event::listen(Login::class, [LogAuthenticationEvents::class, 'handleLogin']);
        Event::listen(Logout::class, [LogAuthenticationEvents::class, 'handleLogout']);
        Event::listen(Failed::class, [LogAuthenticationEvents::class, 'handleFailedLogin']);

        User::observe(UserObserver::class);

        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        UploadedFile::macro('storeOnCloudinary', function (string $folder = 'student_clearance_pics') {
            return Cloudinary::uploadApi()->upload(
                $this->getRealPath(),
                ['folder' => $folder, 'resource_type' => 'auto']
            );
        });

    }


}
