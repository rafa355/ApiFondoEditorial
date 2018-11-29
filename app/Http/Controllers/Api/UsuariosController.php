<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Modelos\Observacion;

use Mail;
use App\Mail\Notificaciones;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function obtener_usuarios(){
    	return response()->json(User::all());
    }
    public function obtener_usuario($id){
        $usuario = User::find($id);
    	return response()->json($usuario);
    }
    public function crear_usuario(Request $request ){
        $usuario = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            ]);
            $observacion = Observacion::create([
                'actualizacion' => 'NO',
                'titulo' => 'Creación de Usuario Autorizado',
                'observacion' => 'Se creó el Usuario Autorizado '.$usuario->name,
            ]);
       // Mail::to('rafa350.rr@gmail.com')->send(new Notificaciones('Se registro nuevo usuario autorizado.'));
    	return response()->json($usuario);
    }

    public function eliminar_usuario(Request $request,$id){
        $usuario = User::find($id);
        $usuario_borrado = $usuario;
        $usuario->delete();

        $observacion = Observacion::create([
            'actualizacion' => $request->actualizacion,
            'titulo' => 'Eliminación de usuario '.$usuario_borrado->name,
            'observacion' => $request->observacion,
        ]);
    	return response()->json('Se Elimino');
    }
}
