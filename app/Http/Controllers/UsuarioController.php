<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::orderBy('nomusu')->orderBy('localidad')->paginate(5);
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $misPerfils = Perfil::getArrayIdNombre();
        return view('usuarios.create', compact('misPerfils'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //1.- Validamos
         $request->validate([
            'nomusu' => ['required', 'string', 'min:3', 'max:30', 'unique:usuarios,nomusu'],
            'mail' => ['required', 'string', 'min:10', 'max:200', 'unique:usuarios,mail'],
            'localidad' => ['required', 'string', 'min:1', 'max:50'],
            'perfil_id'=>['required']
        ]);
        //2.- Procesar
        try {
            Usuario::create($request->all());
        } catch (\Exception $ex) {
            return redirect()->route('usuarios.index')->with("mensaje", "Error con la BBDD: ".$ex->getMessage());
        }
        return redirect()->route('usuarios.index')->with("mensaje", "Usuari@ registrad@");
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        $misPerfils=Perfil::getArrayIdNombre();
        return view('usuarios.edit',compact('misPerfils','usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //1. Validamos
        $request->validate([
            'nomusu'=>['required', 'string', 'min:3', 'max:30', 'unique:usuarios,nomusu,'.$usuario->id],
            'mail'=>['required', 'string', 'min:10', 'max:200', 'unique:usuarios,mail,'.$usuario->id],
            'localidad'=>['required', 'string', 'min:1', 'max:50'],
            'perfil_id'=>['required']
        ]);

        //2. Proceso los datos
        try {
            $usuario->update($request->all());
        } catch (Exception $ex) {
            return redirect()->route('usuarios.index')->with('mensaje','Error al procesar los datos: '.$ex->getMessage());
        }
        return redirect()->route('usuarios.index')->with('mensaje','Usuario actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        try {
            $usuario->delete();
        } catch (Exception $ex) {
            return redirect()->route('usuarios.index')->with('mensaje', 'Error en la base de datos');
        }
        return redirect()->route('usuarios.index')->with('mensaje', 'Usuario eliminado');
    }
}
