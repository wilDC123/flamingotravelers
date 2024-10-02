<?php

namespace App\Http\Controllers;

use App\Models\Reservation; // Asegúrate de tener este modelo
use PDF; // Alias del package laravel-dompdf
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function generarPDF()
    {
        // Obtener todas las reservas
        $reservations = Reservation::all();

        // Enviar datos a la vista
        $pdf = PDF::loadView('reportes.reservas_pdf', compact('reservations'));

        // Descargamos el PDF
        return $pdf->download('reporte_reservas.pdf');
    }
}
