<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Rol;
use Gate;

class AdminController extends Controller
{

    public function verUsuarios()
    {
        if (Gate::denies('administrador')) 
        {
            // abort(403);
            return redirect(route('home'));
        }
        $usuariosMenu = true;
        $ideasMenu = false;
        return view('menu-link.usuarios', compact('usuariosMenu', 'ideasMenu'));
    }

    public function verUsuario($id)
    {
        if (Gate::denies('administrador')) 
        {
            return redirect(route('home'));
        }

        $roles = Rol::orderBy('nombre')->get();

        $usuario = User::join('rol_user', 'users.id', 'rol_user.user_id')
                        ->join('rols','rol_user.rol_id', 'rols.id')
                        ->where('users.id', $id)
                        ->select('users.*', 'rols.nombre as rol')
                        ->first();
        
        return view('users.show')->with([
            'usuario' => $usuario,
            'roles' => $roles,
            'usuariosMenu' => true,
            'ideasMenu' => false,
        ]);
    }

    public function editUsuario($id)
    {
        if (Gate::denies('administrador')) 
        {
            return redirect(route('home'));
        }

        $roles = Rol::orderBy('nombre')->get();

        $usuario = User::join('rol_user', 'users.id', 'rol_user.user_id')
                        ->join('rols','rol_user.rol_id', 'rols.id')
                        ->where('users.id', $id)
                        ->select('users.*', 'rols.nombre as rol')
                        ->first();
        $usuario = User::findOrFail($id);
        $rolesUsuario = DB::select('select * from rol_user where user_id = :id', ['id' => $id]);
        return view('users.edit')->with([
            'usuario' => $usuario,
            'roles' => $roles,
            'usuariosMenu' => true,
            'ideasMenu' => false,
            'rolesUsuario' => $rolesUsuario,
        ]);
    }

    public function updateUsuario(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->roles()->sync($request->rol);

        $user->name = $request->name;
        $user->email = $request->email;
        
        if ($user->save()) {
            $request->session()->flash('mensaje',  '¡Se han modificado los datos del usuario '. $user->name . ' exitosamente!');
        } else {
            $request->session()->flash('mensaje', '¡Hubo un error al modificar los datos del usuario '. $user->name .'!');
        }

        return redirect()->route('verUsuarios');
    }
}
