<?php

use App\Http\Controllers\CertificateController;
use App\Livewire\Actions\Logout;
use App\Livewire\AdminAnnouncement;
use App\Livewire\AdminDashboard;
use App\Livewire\Announcements;
use App\Livewire\OfficerDashboard;
use App\Livewire\Emails;
use App\Livewire\Login;
use App\Livewire\ClearanceRequests;
use App\Livewire\OfficerManagement;
use App\Livewire\Student;
use App\Livewire\UnitManagement;
use App\Livewire\UserManagement;
use App\Models\Unit;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

Route::get('/', function () {
    return view('index');
});

Route::get('login', Login::class)->name('login');
Route::post('logout', Logout::class)->name('logout');

Route::get('student/dashboard', Student::class)->name('student.dashboard')->middleware(['auth','role:student']);

Route::prefix(config('app.admin_prefix'))->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('dashboard', AdminDashboard::class)->name('dashboard');
    Route::get('unit-management', UnitManagement::class)->name('unit-management');
    Route::get('clearance-requests', ClearanceRequests::class)->name('clearance-requests');
    Route::get('officers-management', OfficerManagement::class)->name('officers');
    Route::get('user-management', UserManagement::class)->name('user-management');
    Route::get('announcements', AdminAnnouncement::class)->name('announcements');
});

Route::get('/clearance/{clearance_request}/certificate', [CertificateController::class, 'download'])
    ->middleware('auth')
    ->name('certificate.download');

Route::prefix('{unit:slug}')->middleware(['auth', 'role:officer'])->group(function () {
    Route::get('dashboard', OfficerDashboard::class)->name('unit.dashboard');
    Route::get('clearance-requests', ClearanceRequests::class)->name('unit.clearance-requests');
    Route::get('announcements', Announcements::class)->name('unit.announcements');
    Route::get('emails', Emails::class)->name('unit.emails');
});
