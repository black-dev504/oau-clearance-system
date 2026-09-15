<?php


// app/Http/Controllers/CertificateController.php
namespace App\Http\Controllers;

use App\Enums\ClearanceStatus;
use App\Models\ClearanceRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificateController extends Controller
{
public function download(ClearanceRequest $clearance_request)
{
// 1. Ownership check — students can only download their own
abort_unless(
$clearance_request->user_id === auth()->id(),
403
);

// 2. Status check — this is the real gate, not the disabled button
abort_unless(
$clearance_request->status === ClearanceStatus::APPROVED,
403,
'Certificate not available until clearance is complete.'
);

$pdf = Pdf::loadView('certificates.clearance', [
'student' => $clearance_request->user,
'clearance_request' => $clearance_request,
'issuedAt' => now(),
]);

return $pdf->download("clearance-certificate-{$clearance_request->matric_number}.pdf");
}
}
