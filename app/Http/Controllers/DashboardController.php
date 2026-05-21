<?php

namespace App\Http\Controllers;

use App\Http\Requests\DashboardRequest;
use App\Livewire\OfficerDashboard;
use App\Livewire\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
        public function index(DashboardRequest $request)
        {

            return match ($request->user()->role) {
                'admin' => redirect()->route('admin.dashboard'),
                'officer' => OfficerDashboard::class,
                'student' => Student::class,
                default => abort(403, 'Unauthorized'),
            };
        }
}
