<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;

class UserController extends Controller
{

    /**
     * Devuelve una peticion de busqueda 
     * junto con los productos que hay en la DB
     * 
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $name = trim($request->get('name'));

        $users =  User::orderBy('id', 'ASC')
            ->name($name)
            ->paginate();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function create()
    {
        return view('admin.users.create');
    }

        /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
     public function store(RegisterRequest $data)
     {
            $users = new User;
            $users->name = $data->name;
            $users->email = $data->email;
            $users->password = Hash::make($data->password);
            $users->save();

        return redirect()->route('admin.users.index',compact($users));
     }

    /**
     * Recibe y devuelve un ID con la información del producto
     *a lavista edit

     * @param User $user
     * @return void
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Se reciben los datos atravez del request
     *  y luego se actualizan en la BD
     * 
     * @param Request $request
     * @param User $user
     * @return void
     */
    public function update(Request $request, User $user)
    {
        if ($request->trick) {
            $user->update([
                'name' => $request->name,
                // 'email' => $request->email,
            ]);
        } else {
            $user->disabled_at = $user->disabled_at ? null : now();
            $user->save();
        }

        return back()->with('message', 'Se ha actualizado exitosamente');
    }

    /**
     * Se resive el ID del producto 
     * y se elimina de la base de datos
     * y devuelve el mensaje de validación
     * 
     * @param User $user
     * @return void
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('message', 'Se ha eliminado exitosamente');
    }
}
