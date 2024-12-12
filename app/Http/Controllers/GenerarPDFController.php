<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class GenerarPDFController extends Controller
{
    public function generateCV(Request $request)
    {
        // Validar datos de entrada
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'education' => 'required|string',
            'experience' => 'required|string',
            'skills' => 'required|string',
            'languages' => 'required|string',
        ]);

        // Crear una instancia de Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $pdf = new Dompdf($options);

        // Cargar la vista con los datos del CV
        $html = view('cv.pdf', $data)->render();

        // Cargar el HTML en Dompdf
        $pdf->loadHtml($html);

        // (Opcional) Configurar el tamaño y la orientación del papel
        $pdf->setPaper('A4', 'portrait');

        // Renderizar el PDF (esto convierte el HTML en PDF)
        $pdf->render();

        // Descargar el archivo PDF generado
        return $pdf->stream('cv.pdf');
    }
}
