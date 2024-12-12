<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\CV;
class CVController extends Controller
{
    public function showForm()
    {
        // Retorna la vista del formulario para llenar los datos del CV
        return view('cv.form');
    }

    public function generateCV(Request $request)
    {
        // Validar los datos recibidos en el formulario
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'education' => 'required|string',
            'experience' => 'required|string',
            'skills' => 'required|string',
            'languages' => 'required|string',
        ]);

          // Crear el CV en la base de datos
          $cv = CV::create([
            'user_id' => auth()->id(), // El ID del usuario autenticado
            'name' => $data['name'],
            'email' => $data['email'],
            'education' => $data['education'],
            'experience' => $data['experience'],
            'skills' => $data['skills'],
            'languages' => $data['languages'],
        ]);

        // Crear una instancia de Dompdf con opciones
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);  // Habilitar el parseo de HTML5
        $options->set('isPhpEnabled', true);          // Habilitar el uso de PHP dentro de HTML (si es necesario)
        $pdf = new Dompdf($options);

        // Cargar la vista del CV con los datos pasados
        $html = view('cv.pdf', $data)->render();

        // Cargar el HTML en Dompdf
        $pdf->loadHtml($html);

        // Configurar el tamaño del papel y la orientación
        $pdf->setPaper('A4', 'portrait'); // o 'landscape' para apaisado

        // Renderizar el PDF
        $pdf->render();

        // Descargar el archivo PDF generado
        return $pdf->stream('cv.pdf');  // `stream` para mostrar el PDF en el navegador
        // return $pdf->download('cv.pdf'); // Para forzar la descarga en lugar de mostrarlo
    }

    public function index()
    {
        // Obtener los CVs del usuario autenticado
        $cvs = CV::where('user_id', auth()->id())->get();
        return view('cv.index', compact('cvs'));
    }

    public function edit($id)
    {
        // Encontrar el CV del usuario autenticado
        $cv = CV::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('cv.edit', compact('cv'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'education' => 'required|string',
            'experience' => 'required|string',
            'skills' => 'required|string',
            'languages' => 'required|string',
        ]);

        // Actualizar el CV del usuario autenticado
        $cv = CV::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $cv->update($data);

        return redirect()->route('cv.index')->with('success', 'CV actualizado exitosamente.');
    }

    public function destroy($id)
    {
        // Eliminar el CV del usuario autenticado
        $cv = CV::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $cv->delete();

        return redirect()->route('cv.index')->with('success', 'CV eliminado exitosamente.');
    }

    public function download($id)
    {
        $cv = CV::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        // Renderizar el PDF con los datos del CV
        $html = view('cv.pdf', $cv->toArray())->render();
        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($html);

        return $pdf->download("cv_{$cv->name}.pdf");
    }



}
