<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{

    public function index()
    {

        $usuarios =  User::all();

        return view('admin.users.usuarios', compact('usuarios'));
    }


    public function editar($usuarioId)
    {
        $usuario = User::find($usuarioId);

        return view('admin.users.edit_user', compact('usuario'));
    }

    public function actualizar(Request $request, User $usuario)
    {

        $enabledAt = $request->estado ? now() : null;

        $usuario->update([
            'name' => $request->nombre,
            'enabled_at' => $enabledAt
        ]);

        return redirect()->route('User');
    }

    public function destroy($usuarioId)
    {
        $usuario = User::find($usuarioId);
        $usuario->delete();
        return redirect()->route('User');
    }
}
