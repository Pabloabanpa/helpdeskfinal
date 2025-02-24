<?php

namespace App\Http\Controllers;

use App\Models\FuncionariosSoporte;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\FuncionariosSoporteRequest;
use App\Models\Funcionario;
use App\Models\Role;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class FuncionariosSoporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $funcionariosSoportes = FuncionariosSoporte::paginate();

        return view('funcionarios-soporte.index', compact('funcionariosSoportes'))
            ->with('i', ($request->input('page', 1) - 1) * $funcionariosSoportes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $funcionariosSoporte = new FuncionariosSoporte();
        $funcionarios = Funcionario::all(); // Obtener todos los funcionarios
        $roles = Role::select('id', 'nombre')->get(); // Obtener lista de roles

        return view('funcionarios-soporte.create', compact('funcionariosSoporte', 'funcionarios', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FuncionariosSoporteRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        // Verificar si la contraseña está presente y encriptarla
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            return Redirect::back()->withErrors(['password' => 'La contraseña es obligatoria.'])->withInput();
        }

        // 🚀 Guardar los datos correctamente (ahora usando `$validatedData`)
        FuncionariosSoporte::create($validatedData);

        return Redirect::route('funcionarios-soportes.index')
            ->with('success', 'Funcionario de soporte creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $funcionariosSoporte = FuncionariosSoporte::findOrFail($id);

        return view('funcionarios-soporte.show', compact('funcionariosSoporte'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $funcionariosSoporte = FuncionariosSoporte::findOrFail($id);
        $funcionarios = Funcionario::all(); // Obtener lista de funcionarios
        $roles = Role::select('id', 'nombre')->get(); // Obtener lista de roles

        return view('funcionarios-soporte.edit', compact('funcionariosSoporte', 'funcionarios', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FuncionariosSoporteRequest $request, FuncionariosSoporte $funcionariosSoporte): RedirectResponse
    {
        $validatedData = $request->validated();

        // Si el usuario quiere actualizar la contraseña, encriptarla
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']); // Evitar que se actualice con NULL
        }

        $funcionariosSoporte->update($validatedData);

        return Redirect::route('funcionarios-soportes.index')
            ->with('success', 'Funcionario de soporte actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        FuncionariosSoporte::findOrFail($id)->delete();

        return Redirect::route('funcionarios-soportes.index')
            ->with('success', 'Funcionario de soporte eliminado correctamente.');
    }
}
