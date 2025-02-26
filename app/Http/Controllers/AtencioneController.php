<?php

namespace App\Http\Controllers;

use App\Models\Atencione;
use App\Models\FuncionariosSoporte;
use App\Models\Solicitude;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AtencioneRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AtencioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $atenciones = Atencione::paginate();

        return view('atencione.index', compact('atenciones'))
            ->with('i', ($request->input('page', 1) - 1) * $atenciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $atencione = new Atencione();
        $funcionariosSoporte = FuncionariosSoporte::all(); // Obtener funcionarios
        $solicitude = Solicitude::all(); // Obtener solicitudes


        return view('atencione.create', compact('atencione', 'funcionariosSoporte', 'solicitude'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AtencioneRequest $request): RedirectResponse
    {
        Atencione::create($request->validated());

        return Redirect::route('atenciones.index')
            ->with('success', 'Atencione created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $atencione = Atencione::find($id);

        return view('atencione.show', compact('atencione'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $atencione = Atencione::find($id);
        $funcionariosSoporte = FuncionariosSoporte::all(); // Obtener funcionarios de soporte
        $solicitude = Solicitude::all(); // Obtener solicitudes

        return view('atencione.edit', compact('atencione', 'funcionariosSoporte', 'solicitude'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AtencioneRequest $request, Atencione $atencione): RedirectResponse
    {
        $atencione->update($request->validated());

        return Redirect::route('atenciones.index')
            ->with('success', 'Atencione updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Atencione::find($id)->delete();

        return Redirect::route('atenciones.index')
            ->with('success', 'Atencione deleted successfully');
    }
}
