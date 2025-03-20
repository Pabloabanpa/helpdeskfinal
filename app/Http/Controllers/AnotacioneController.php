<?php

namespace App\Http\Controllers;

use App\Models\Anotacione;
use App\Models\Atencione;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AnotacioneRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AnotacioneController extends Controller
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
        $anotaciones = Anotacione::paginate();

        return view('anotacione.index', compact('anotaciones'))
            ->with('i', ($request->input('page', 1) - 1) * $anotaciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $anotacione = new Anotacione();
        $atencione = Atencione::all(); // Obtener anotaciones



        return view('anotacione.create', compact('anotacione', 'atencione'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnotacioneRequest $request): RedirectResponse
    {
        Anotacione::create($request->validated());

        return Redirect::route('dashboard')
            ->with('success', ' successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $anotacione = Anotacione::find($id);

        return view('anotacione.show', compact('anotacione'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $anotacione = Anotacione::find($id);
        $atencione = Atencione::all(); // Obtener anotaciones


        return view('anotacione.edit', compact('anotacione', 'atencione'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnotacioneRequest $request, Anotacione $anotacione): RedirectResponse
    {
        $anotacione->update($request->validated());

        return Redirect::route('dashboard')
        ->with('success', ' successfully.');
    }

    public function destroy($id): RedirectResponse
    {
        Anotacione::find($id)->delete();

        return Redirect::route('dashboard')
            ->with('success', ' successfully.');
    }
}
