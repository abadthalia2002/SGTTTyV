<?php

namespace App\Http\Controllers;

use App\Models\ControlRecord;
use App\Models\InternmentRecord;
use App\Models\TransportAssociation;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function gneratePdfInternmentRecord($internmentRecordId)
    {
        $internmentRecord = InternmentRecord::with(['driver', 'vehicle', 'partner'])->find($internmentRecordId);
        $pdf = Pdf::loadView('pdf.internment-record', ['internmentRecord' => $internmentRecord]);
        return $pdf->download('invoice.pdf');
    }

    public function generatePdfAssociation($associationId)
    {
        $association = TransportAssociation::with([
            'partner',
            'partners',
            'drivers.vehicle',
            'vehicles.partner'
        ])->findOrFail($associationId);

        $pdf = Pdf::loadView('pdf.transport-association', [
            'transportAssociation' => $association
        ]);

        return $pdf->download('permiso-operacion.pdf');
    }


    public function generatePdfControlRecord($controlRecordId)
    {
        $record = ControlRecord::with(['driver', 'vehicle', 'partner'])
            ->findOrFail($controlRecordId);

        $pdf = Pdf::loadView('pdf.control-record', [
            'record' => $record
        ]);

        return $pdf->download('acta-control.pdf');

        /* return view('pdf.control-record', compact('record'));  */
    }
}
