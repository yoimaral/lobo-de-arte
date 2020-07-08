<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{

    public function index()
    {

        $usuarios =  User::all();

        return view('usuarios', compact('usuarios'));
    }



    public function editar($usuarioId) /* me recibe por parametro el metodo id de la vista usuarios.blade.php */
    {
        $usuario = User::find($usuarioId);

        return view('edit_user', compact('usuario'));
    }



    public function actualizar(Request $request, $usuarioId)
    {
        $usuario = User::find($usuarioId);
        $estad = $usuario->state;

        if ($request->estado === '1') {
            $estad = true;
        }
        if ($request->estado === '0') {
            $estad = false;
        }
        $usuario->update([
            'name' => $request->nombre,
            'state' => $estad
        ]);

        return redirect()->route('User');
        // return $estad;
    }

    public function destroy($usuarioId)
    {
        $usuario = User::find($usuarioId);
        $usuario->delete();
        return redirect()->route('User');
    }
}
