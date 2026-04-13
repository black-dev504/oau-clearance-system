<?php

use App\Livewire\Dashboard;
use App\Livewire\Login;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('login', Login::class)->name('login');
Route::get('dashboard', Dashboard::class)->name('dashboard');
