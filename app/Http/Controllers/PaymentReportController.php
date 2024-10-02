<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use PDF; // Asegúrate de importar la clase PDF si estás usando la librería DomPDF

class PaymentReportController extends Controller
{
    public function showPaymentReport()
    {
        // Obtener todos los pagos
        $payments = Payment::with('reservation')->get();
        
        // Generar el PDF
        $pdf = PDF::loadView('reportespagos.pagos_pdf', compact('payments'));
        
        // Descargar el PDF
        return $pdf->download('reporte_pagos.pdf');
    }
}
