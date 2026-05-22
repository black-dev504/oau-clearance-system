<?php

use App\Livewire\Actions\Logout;
use App\Livewire\AdminDashboard;
use App\Livewire\Announcements;
use App\Livewire\OfficerDashboard;
use App\Livewire\Emails;
use App\Livewire\Login;
use App\Livewire\ClearanceRequests;
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
    Route::prefix($unit)->name($unit . '.')->middleware(['auth','role:officer'])->group(function () {
        Route::get('dashboard', OfficerDashboard::class)->name('dashboard');
        Route::get('clearance-requests', ClearanceRequests::class)->name('clearance-requests');
        Route::get('announcements', Announcements::class)->name('announcements');
        Route::get('emails', Emails::class)->name('emails');
    });
}

Route::get('student/dashboard', Student::class)->name('student.dashboard')->middleware(['auth','role:student']);

Route::domain(config('app.admin_prefix').config('app.domain'))->name('admin.')->middleware(['auth','role:admin'])->group(function () {
    Route::get('dashboard', AdminDashboard::class)->name('dashboard');

});
