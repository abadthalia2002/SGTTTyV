<?php

namespace App\Http\Controllers;

use App\Models\InternmentRecord;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function gneratePdfInternmentRecord($internmentRecordId)
    {
        $internmentRecord = InternmentRecord::with(['driver', 'vehicle', 'partner'])->find($internmentRecordId);
        $pdf = Pdf::loadView('pdf.internment-record', [ 'internmentRecord' => $internmentRecord]);
        return $pdf->download('invoice.pdf'); 
    }
}
