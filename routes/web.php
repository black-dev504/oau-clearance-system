<?php

use App\Livewire\Actions\Logout;
use App\Livewire\Announcements;
use App\Livewire\Dashboard;
use App\Livewire\Emails;
use App\Livewire\Login;
use App\Livewire\PendingRequests;
use App\Livewire\Student;
use App\Models\Unit;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('login', Login::class)->name('login');
Route::post('logout', Logout::class)->name('logout');



$units = Unit::pluck('slug')->toArray();


foreach ($units as $unit) {
    Route::prefix($unit)->name($unit . '.')->middleware(['auth','role:admin,officer'])->group(function () {
        Route::get('dashboard', Dashboard::class)->name('dashboard');
        Route::get('pending-requests', PendingRequests::class)->name('pending');
        Route::get('announcements', Announcements::class)->name('announcements');
        Route::get('emails', Emails::class)->name('emails');
    });
}
Route::get('student/dashboard', Student::class)->name('student.dashboard');
