<?php

namespace App\Http\Controllers;

use App\Models\Anotacione;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AnotacioneRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AnotacioneController extends Controller
{
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

        return view('anotacione.create', compact('anotacione'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnotacioneRequest $request): RedirectResponse
    {
        Anotacione::create($request->validated());

        return Redirect::route('anotaciones.index')
            ->with('success', 'Anotacione created successfully.');
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

        return view('anotacione.edit', compact('anotacione'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnotacioneRequest $request, Anotacione $anotacione): RedirectResponse
    {
        $anotacione->update($request->validated());

        return Redirect::route('anotaciones.index')
            ->with('success', 'Anotacione updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Anotacione::find($id)->delete();

        return Redirect::route('anotaciones.index')
            ->with('success', 'Anotacione deleted successfully');
    }
}
