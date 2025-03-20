<?php

namespace App\Http\Controllers;

use App\Models\Atencione;
use App\Models\Funcionario;
use App\Models\Solicitude;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AtencioneRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AtencioneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:funcionario');

    }
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
        $funcionarios = Funcionario::all(); // Obtener funcionarios normales
        $solicitude = Solicitude::all(); // Obtener solicitudes


        return view('atencione.create', compact('atencione', 'funcionarios', 'solicitude'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AtencioneRequest $request): RedirectResponse
    {
        Atencione::create($request->validated());

        return Redirect::route('dashboard')
            ->with('success', 'successfully.');
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
        $funcionarios = Funcionario::all(); // Obtener funcionarios normales
        $solicitude = Solicitude::all(); // Obtener solicitudes

        return view('atencione.edit', compact('atencione', 'funcionarios', 'solicitude'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AtencioneRequest $request, Atencione $atencione): RedirectResponse
    {
        $atencione->update($request->validated());

        return Redirect::route('dashboard')
            ->with('success', 'successfully.');
    }

    public function destroy($id): RedirectResponse
    {
        Atencione::find($id)->delete();

        return Redirect::route('dashboard')
            ->with('success', 'successfully.');
    }
}
