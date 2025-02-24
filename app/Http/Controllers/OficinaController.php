<?php

namespace App\Http\Controllers;

use App\Models\Oficina;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\OficinaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OficinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $oficinas = Oficina::paginate();

        return view('oficina.index', compact('oficinas'))
            ->with('i', ($request->input('page', 1) - 1) * $oficinas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $oficina = new Oficina();

        return view('oficina.create', compact('oficina'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OficinaRequest $request): RedirectResponse
    {
        Oficina::create($request->validated());

        return Redirect::route('oficinas.index')
            ->with('success', 'Oficina created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $oficina = Oficina::find($id);

        return view('oficina.show', compact('oficina'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $oficina = Oficina::find($id);

        return view('oficina.edit', compact('oficina'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OficinaRequest $request, Oficina $oficina): RedirectResponse
    {
        $oficina->update($request->validated());

        return Redirect::route('oficinas.index')
            ->with('success', 'Oficina updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Oficina::find($id)->delete();

        return Redirect::route('oficinas.index')
            ->with('success', 'Oficina deleted successfully');
    }
}
