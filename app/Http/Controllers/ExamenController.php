<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ExamenController extends Controller
{

    public function buscarUsuarios(Request $request){
        $usuarios = User::where("email",'like',$request->text."%")->take(3)->get();
        return view("pages.usuarios",compact("usuarios"));
    }

    public function usuarios(){
        $usuarios = User::paginate(4);

        return view('usuarios', compact('usuarios'));
    }

    public function agregarUsuario(Request $request){
        // return $request;

        $request->validate([
            'email' => 'required|unique:users|max:64',
            'nombre' => 'required|max:64',
            'contraseña' => 'required|min:6'
        ]);

        $usuario = User::create([
            'email' => $request->email,
            'name' => $request->nombre,
            'password' => bcrypt($request->contraseña),
        ]);

        return redirect()->back()->with('mensaje', 'Se agrego al usuario con el email "'.$request->email.'"');
    }

    public function modificarUsuario(Request $request){
        // return $request;
        $usuario = User::find($request->id);

        if($request->email && $request->email != $usuario->email){
            $request->validate([
                'email' => 'unique:users|max:64',
            ]);
            $usuario->update([
                'email' => $request->email,
            ]);
        }

        if($request->nombre && $request->nombre != $usuario->name){
            $request->validate([
                'nombre' => 'max:64',
            ]);
            $usuario->update([
                'name' => $request->nombre,
            ]);
        }

        if($request->contraseña && $request->contraseña){
            $request->validate([
                'contraseña' => 'min:6'
            ]);
            $usuario->update([
                'password' => bcrypt($request->contraseña),
            ]);
        }

        

        return redirect()->back()->with('mensaje', 'Se actualizo al usuario con el email "'.$request->email.'"');
    }

    public function eliminarUsuario($id){
        User::find($id)->delete();

        return redirect()->back()->with('mensaje', '1');
    }

    // -------------------------------------------------------------------------------------------

    public function buscarTareas(Request $request){
        $tareas = Tarea::where("nombre",'like',$request->text."%")->take(3)->get();
        return view("pages.tareas",compact("tareas"));
    }

    public function tareas(){
        $tareas = Tarea::paginate(4);

        return view('tareas', compact('tareas'));
    }

    public function agregarTarea(Request $request){
        // return $request->id;

        $request->validate([
            'nombre' => 'required|max:100',
            'descripcion' => 'required|max:300',
            'fechaInicio' => 'required',
            'fechaFin' => 'required',
        ]);

        if($request->fechaInicio > $request->fechaFin){
        return redirect()->back()->with('errorx', 'Las fechas no son validas')->withInput();
        }

        $tarea = Tarea::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'id_user' => $request->id,
            'fechaInicio' => $request->fechaInicio,
            'fechaFin' => $request->fechaFin,
        ]);

        return redirect()->back()->with('mensaje', 'Se agrego la tarea al usuario con el email ');
    }


    public function modificarTarea(Request $request){
        // return $request;

        if($request->fechaInicio > $request->fechaFin){
        return redirect()->back()->with('errorx', 'Las fechas no son validas')->withInput();
        }

        $tarea = Tarea::find($request->id);

            $request->validate([
                'nombre' => 'required|max:100',
                'descripcion' => 'required|max:300',
                'fechaInicio' => 'required',
                'fechaFin' => 'required',
            ]);

            $tarea->update([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'fechaInicio' => $request->fechaInicio,
                'fechaFin' => $request->fechaFin,
            ]);

       

        return redirect()->back()->with('mensaje', 'Se actualizo la tarea');
    }

    public function eliminarTarea($id){
        Tarea::find($id)->delete();

        return redirect('tareas')->with('mensaje', '1');
    }
}
