<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Exception;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfiles = Perfil::orderBy('nombre')->paginate(5);
        return view('perfiles.index', compact('perfiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perfiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //1. Validamos
         $request->validate([
            'nombre'=>['required', 'string', 'min:9', 'max:100', 'unique:perfils,nombre'],
            'descripcion'=>['required', 'string', 'min:10', 'max:100']
        ]);

        //2. Proceso los datos
        try {
            Perfil::create($request->all());
        } catch (Exception $ex) {
            return redirect()->route('perfils.index')->with('mensaje','Error al procesar los datos: '.$ex->getMessage());
        }
        return redirect()->route('perfils.index')->with('mensaje','Usuario registrado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        return view('perfiles.show', compact('perfil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        return view('perfiles.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
        //1. Validamos
        $request->validate([
            'nombre'=>['required', 'string', 'min:9', 'max:100', 'unique:perfils,nombre,'.$perfil->id],
            'descripcion'=>['required', 'string', 'min:10', 'max:100']
        ]);

        //2. Proceso los datos
        try {
            $perfil->update($request->all());
        } catch (Exception $ex) {
            return redirect()->route('perfils.index')->with('mensaje','Error al procesar los datos: '.$ex->getMessage());
        }
        return redirect()->route('perfils.index')->with('mensaje','Perfil actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        try {
            $perfil->delete();
        } catch (Exception $ex) {
            return redirect()->route('perfils.index')->with('mensaje','Error al procesar los datos: '.$ex->getMessage());
        }
        return redirect()->route('perfils.index')->with('mensaje','Perfil eliminado');
    }
}
