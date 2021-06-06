<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion'];

    public function usuario(){
        //Un perfil puede tener muchos usuarios
        return $this->hasMany(Usuario::class);
    }
    //Método para mostrar los perfiles en el create/edit de los usuarios
    public static function getArrayIdNombre(){
        $perfil = Perfil::orderBy('nombre')->get();
        $miArray = [];
        foreach($perfil as $item){
            $miArray[$item->id] = $item->nombre;
        }
        return $miArray;
    }
}
