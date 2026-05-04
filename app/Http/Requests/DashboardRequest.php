<?php

namespace App\Http\Requests;

use App\Models\Clearance;
use App\Models\ClearanceRequest;
use App\Models\Unit;
use Illuminate\Foundation\Http\FormRequest;

class DashboardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }

    public function data($key = null, $default = null)
    {
        return match (user()->role) {
            'admin' => $this->adminDashboard,
            'officer' => $this->officerDashboard(user()?->unit),
        };
    }

    public function adminDashboard()
    {
        return [
        ];

    }

    public function officerDashboard(Unit $unit)
    {
        return [
            'total' => $unit->clearances()->count(),
            'pending' => $unit->clearances()->pending()->count(),
            'approved' => $unit->clearances()->approved()->count(),
            'rejected' => $unit->clearances()->rejected()->count(),
        ];
    }


}
