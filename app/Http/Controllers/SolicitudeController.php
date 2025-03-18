<?php

namespace App\Http\Controllers;

use App\Models\Solicitude;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SolicitudeController extends Controller
{
    /**
     * Muestra todas las solicitudes.
     */
    public function index(Request $request): View
    {
        $solicitudes = Solicitude::paginate(10);

        return view('solicitude.index', compact('solicitudes'))
            ->with('i', ($request->input('page', 1) - 1) * $solicitudes->perPage());
    }

    /**
     * Muestra el formulario para crear una nueva solicitud.
     */
    public function create(): View
    {
        $funcionarios = Funcionario::all();

        return view('solicitude.create', compact('funcionarios'));
    }



    /**
     * Guarda la solicitud en la base de datos.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'funcionario_id' => 'required|exists:funcionarios,id',
            'equipo_id' => 'nullable|string|max:255',
            'descripcion_solicitud' => 'required|string|max:1000',
            'archivo' => 'nullable|file|mimes:pdf,doc,docx|max:30120',
            'estado' => 'required|in:en espera,en proceso,finalizada,cancelada',
            'fecha_creacion' => 'required|date',
            'tipo_solicitud' => 'required|string|max:255'
        ]);

        if ($request->hasFile('archivo')) {
            $validatedData['archivo'] = $request->file('archivo')->store('archivos_solicitudes', 'public');
        }

        $solicitude = Solicitude::create($validatedData);

        return redirect()->route('dashboard')->with('success', 'Solicitud creada exitosamente.');
    }


    /**
     * Muestra la solicitud específica.
     */
    public function show($id): View
    {
        $solicitude = Solicitude::findOrFail($id);

        return view('solicitude.show', compact('solicitude'));
    }

    /**
     * Muestra el formulario para editar una solicitud.
     */

    public function edit($id)
{
    $solicitude = Solicitude::findOrFail($id);
    $funcionarios = Funcionario::all();
    
    return view('solicitude.edit', compact('solicitude', 'funcionarios'));
}


    /**
     * Actualiza una solicitud.
     */
    public function update(Request $request, Solicitude $solicitude)
    {
        // Validar los datos
        $validatedData = $request->validate([
            'funcionario_id' => 'required|exists:funcionarios,id',
            'equipo_id' => 'nullable|string|max:255',
            'descripcion_solicitud' => 'required|string|max:1000',
            'archivo' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'estado' => 'required|in:en espera,en proceso,finalizada,cancelada',
            'fecha_creacion' => 'required|date',
            'tipo_solicitud' => 'required|string|max:255'
        ]);

        // Manejo del archivo solo si se sube uno nuevo
        if ($request->hasFile('archivo')) {
            // Eliminar el archivo anterior si existía
            if ($solicitude->archivo && Storage::disk('public')->exists($solicitude->archivo)) {
                Storage::disk('public')->delete($solicitude->archivo);
            }    // Si la fecha no se edita, mantener la original
            if (!$request->filled('fecha_creacion')) {
                $validatedData['fecha_creacion'] = $solicitude->fecha_creacion;
            }

            // Guardar el nuevo archivo
            $validatedData['archivo'] = $request->file('archivo')->store('archivos_solicitudes', 'public');
        } else {
            // Mantener el archivo actual si no se sube uno nuevo
            $validatedData['archivo'] = $solicitude->archivo;
        }

        // Actualizar la solicitud
        $solicitude->update($validatedData);

        return Redirect::route('dashboard')->with('success', 'Solicitud actualizada exitosamente.');
    }


    /**
     * Elimina una solicitud.
     */
    public function destroy($id)
    {
        $solicitude = Solicitude::findOrFail($id);

        if ($solicitude->archivo) {
            Storage::disk('public')->delete($solicitude->archivo);
        }

        $solicitude->delete();

        return Redirect::route('dashboard')->with('success', 'Solicitud eliminada correctamente.');
    }
}
