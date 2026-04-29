<?php

namespace App\Providers;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\ServiceProvider;

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
        UploadedFile::macro('storeOnCloudinary', function (string $folder = 'student_clearance_pics') {
            return Cloudinary::uploadApi()->upload(
                $this->getRealPath(),
                ['folder' => $folder, 'resource_type' => 'auto']
            );
        });

    }
}
