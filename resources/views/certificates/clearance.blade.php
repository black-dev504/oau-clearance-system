{{-- resources/views/certificates/clearance.blade.php --}}
    <!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'DejaVu Sans', sans-serif; padding: 60px; }
        .header { text-align: center; margin-bottom: 40px; }
        .details { margin-top: 30px; }
        .details td { padding: 6px 0; }
        .signature { margin-top: 80px; }
    </style>
</head>
<body>
<div class="header">
    <h1>Obafemi Awolowo University</h1>
    <h2>Certificate of Clearance</h2>
</div>

<p>This certifies that</p>
<h2>{{ $student->name }}</h2>
<p>Matric Number: {{ $student->matric_number }}</p>

<div class="details">
    <table>
        <tr><td><strong>Department:</strong></td><td>{{ $student?->department?->name }}</td></tr>
        <tr><td><strong>Faculty:</strong></td><td>{{ $student?->department?->faculty?->name }}</td></tr>
        <tr><td><strong>Cleared on:</strong></td><td>{{ $clearance_request->updated_at->format('F j, Y') }}</td></tr>
        <tr><td><strong>Issued:</strong></td><td>{{ $issuedAt->format('F j, Y g:i A') }}</td></tr>
    </table>
</div>

<p>has satisfactorily completed all clearance requirements from all mandatory university units.</p>
<p style="color:red" class="text-red-600">TO BE FORMATTED TO A STANDARD CLEARANCE CERTIFICATE.</p>



<div class="signature">
    <p>_____________________________</p>
    <p>Registrar</p>
</div>
</body>
</html>
