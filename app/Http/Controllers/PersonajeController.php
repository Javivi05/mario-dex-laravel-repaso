<?php

namespace App\Http\Controllers;

use App\Models\Personaje;
use Illuminate\Http\Request;

class PersonajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Personaje::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("personajes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validado = $request->validate([
            'nombre' => ['required', 'min:3'],
            'tipo' => ['required'],
            'poder' => ['required', 'numeric', 'min:1'],
            'mundo' => ['required'], 
        ]);
        Personaje::create($validado);
        if ($request->expectsJson()) {
            return response()->json(['message' => 'Personaje creado correctamente'], 201);
        }
        return redirect('/personajes/crear') -> with('success', 'Personaje registrado correctamente: ');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $personaje = Personaje::findOrFail($id);
        $personaje->delete();
        return response()->json(['message' => 'Personaje eliminado correctamente']);
    }
}
