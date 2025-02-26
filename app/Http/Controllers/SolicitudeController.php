<?php

namespace App\Http\Controllers;

use App\Models\Solicitude;
use App\Models\Funcionario;
use App\Models\FuncionariosSoporte;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SolicitudeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SolicitudeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $solicitudes = Solicitude::paginate();

        return view('solicitude.index', compact('solicitudes'))
            ->with('i', ($request->input('page', 1) - 1) * $solicitudes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */

     public function create()
     {
         $solicitude = new Solicitude();
         $funcionarios = Funcionario::all(); // Obtener funcionarios normales
         $funcionariosSoporte = FuncionariosSoporte::all(); // Obtener funcionarios de soporte

         return view('solicitude.create', compact('solicitude', 'funcionarios', 'funcionariosSoporte'));
     }



    /**
     * Store a newly created resource in storage.
     */
    public function store(SolicitudeRequest $request)
    {
        $validatedData = $request->validated();

        // Manejo de archivo (solo si es PDF o Word)
        if ($request->hasFile('archivo')) {
            $validatedData['archivo'] = $request->file('archivo')->store('archivos_solicitudes', 'public');
        }

        Solicitude::create($validatedData);

        return Redirect::route('solicitudes.index')
            ->with('success', 'Solicitud creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $solicitude = Solicitude::find($id);

        return view('solicitude.show', compact('solicitude'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $solicitude = Solicitude::with('funcionario', 'funcionarioSoporte')->findOrFail($id);
        $funcionarios = Funcionario::all();
        $funcionariosSoporte = FuncionariosSoporte::all();

        return view('solicitude.edit', compact('solicitude', 'funcionarios', 'funcionariosSoporte'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(SolicitudeRequest $request, Solicitude $solicitude)
    {
        $validatedData = $request->validated();

        // Manejo de archivo (solo si es PDF o Word)
        if ($request->hasFile('archivo')) {
            $validatedData['archivo'] = $request->file('archivo')->store('archivos_solicitudes', 'public');
        }

        $solicitude->update($validatedData);

        return Redirect::route('solicitudes.index')
            ->with('success', 'Solicitud actualizada correctamente.');
    }

    public function destroy($id): RedirectResponse
    {
        Solicitude::find($id)->delete();

        return Redirect::route('solicitudes.index')
            ->with('success', 'Solicitude deleted successfully');
    }
}
