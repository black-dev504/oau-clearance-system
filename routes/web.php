<?php

use App\Livewire\Announcements;
use App\Livewire\Dashboard;
use App\Livewire\Dsa;
use App\Livewire\Emails;
use App\Livewire\Library;
use App\Livewire\Login;
use App\Livewire\PendingRequests;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});





//Route::prefix('dsa')->name('dsa.')->group(function () {
//    Route::get('dashboard', Dsa::class)->name('dashboard');
//    Route::get('pending-requests', PendingRequests::class)->name('pending');
//    Route::get('announcements', Announcements::class)->name('announcements');
//    Route::get('emails', Emails::class)->name('emails');
//});

$units = ['dsa', 'library'];

foreach ($units as $unit) {
    Route::prefix($unit)->name($unit . '.')->group(function () {
        Route::get('dashboard', Dashboard::class)->name('dashboard');
        Route::get('pending-requests', PendingRequests::class)->name('pending');
        Route::get('announcements', Announcements::class)->name('announcements');
        Route::get('emails', Emails::class)->name('emails');
    });
}
