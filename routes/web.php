<?php

use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pdf/generate/internment-record/{internmentRecordId}', [PdfController::class, 'gneratePdfInternmentRecord'])->name('pdf.example');
