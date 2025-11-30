<?php

use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pdf/generate/internment-record/{internmentRecordId}', [PdfController::class, 'gneratePdfInternmentRecord'])->name('pdf.example');


Route::get('/pdf/generate/transport-association/{associationId}', [PdfController::class, 'generatePdfAssociation'])->name('pdf.transport-association');


Route::get('/pdf/generate/control-record/{controlRecordId}', [PdfController::class, 'generatePdfControlRecord'])->name('pdf.control-record');

