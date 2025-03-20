<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Funcionario;
use App\Models\Oficina;
use App\Models\Role; // Se mantiene Role según la estructura Models/Role.php
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\FuncionarioRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class FuncionarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:funcionario');

    }
    /**
     * Mostrar la lista de funcionarios con sus relaciones.
     */
    public function index(Request $request): View
    {
        $funcionarios = Funcionario::with('persona', 'oficina', 'role')->paginate();

        return view('funcionario.index', compact('funcionarios'))
            ->with('i', ($request->input('page', 1) - 1) * $funcionarios->perPage());
    }


    /**
     * Mostrar el formulario para crear un nuevo funcionario.
     */
    public function create(): View
    {
        $funcionario = new Funcionario();
        $personas = Persona::select('id', 'nombre_persona', 'apellido_persona')->get(); // Obtener lista de personas
        $oficinas = Oficina::select('id', 'nombre')->get(); // Obtener lista de oficinas

        $roles = Role::select('id', 'nombre')->get(); // Obtener lista de roles

        return view('funcionario.create', compact('funcionario', 'personas', 'oficinas', 'roles'));
    }

    /**
     * Guardar un nuevo funcionario en la base de datos.
     */
    public function store(FuncionarioRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        // Manejar la subida de imágenes
        if ($request->hasFile('imagen')) {
            $validatedData['imagen'] = $request->file('imagen')->store('imagenes_funcionarios', 'public');
        }

        // Encriptar la contraseña antes de guardarla
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        Funcionario::create($validatedData);

        return Redirect::route('dashboard')
            ->with('success', 'successfully.');;
    }

    /**
     * Mostrar los detalles de un funcionario con sus relaciones.
     */
    public function show($id): View
    {
        $funcionario = Funcionario::with('persona', 'oficina', 'role')->findOrFail($id);

        return view('funcionario.show', compact('funcionario'));
    }

    /**
     * Mostrar el formulario de edición de un funcionario.
     */
    public function edit($id): View
    {
        $funcionario = Funcionario::findOrFail($id);
        $personas = Persona::select('id', 'nombre_persona', 'apellido_persona')->get(); // Obtener lista de personas
        $oficinas = Oficina::select('id', 'nombre')->get(); // Obtener lista de oficinas
        $roles = Role::select('id', 'nombre')->get(); // Obtener lista de roles

        return view('funcionario.edit', compact('funcionario', 'personas', 'oficinas', 'roles'));
    }

    /**
     * Actualizar un funcionario en la base de datos.
     */
    public function update(FuncionarioRequest $request, Funcionario $funcionario): RedirectResponse
    {
        $validatedData = $request->validated();

        // Manejar la actualización de la imagen
        if ($request->hasFile('imagen')) {
            // Si ya existe una imagen anterior, la eliminamos
            if ($funcionario->imagen) {
                Storage::disk('public')->delete($funcionario->imagen);
            }

            // Guardamos la nueva imagen
            $validatedData['imagen'] = $request->file('imagen')->store('imagenes_funcionarios', 'public');
        }

        // Si el usuario no ingresa una nueva contraseña, mantener la actual
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $funcionario->update($validatedData);

        return Redirect::route('dashboard')
            ->with('success', 'successfully.');
    }

    /**
     * Eliminar un funcionario.
     */
    public function destroy($id): RedirectResponse
    {
        $funcionario = Funcionario::findOrFail($id);

        // Eliminar la imagen asociada si existe
        if ($funcionario->imagen) {
            Storage::disk('public')->delete($funcionario->imagen);
        }

        $funcionario->delete();

        return Redirect::route('dashboard')
            ->with('success', 'successfully.');
    }
}
