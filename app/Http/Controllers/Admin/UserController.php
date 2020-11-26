<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserTokenRequest;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{


    /**
     * Devuelve una peticion de busqueda 
     * junto con los productos que hay en la DB
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request): \Illuminate\View\View
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
     * @param RegisterRequest $data
     * @return \Illuminate\Http\RedirectResponse
     */
     public function store(RegisterRequest $data): \Illuminate\Http\RedirectResponse
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
     *
     * @param User $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user): \Illuminate\View\View
    {
        return view('admin.users.edit', compact('user'));
    }


    /**
     * Se reciben los datos atravez del request
     *  y luego se actualizan en la BD
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user): \Illuminate\Http\RedirectResponse
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

        return redirect()->route('users.index')->with('message', 'Se ha actualizado exitosamente');
    }

    /**
     * Se resive el ID del producto 
     * y se elimina de la base de datos
     * y devuelve el mensaje de validación
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user): \Illuminate\Http\RedirectResponse
    {
        $user->delete();

        return redirect()->route('users.index')->with('message', 'Se ha eliminado exitosamente');
    }

        public function export() 
    {
    return (new UsersExport)->download('users.xlsx');

         /* (new UsersExport)->store('users.xlsx', 'public'); Por si lo quiero realizar des del disco publico*/
        
        /* return redirect()->back()->with('message', 'Se ha Exportado exitosamente');  */
    }


    public function import(Request $request)
    {/* 
         $file = $request->file('user_File_Import'); */

        Excel::import(new UsersImport, $request->file('user_File_Import') );
        
        return redirect()->route('users.index')->with('messages', 'Se ha Importado exitosamente');
    }

    
    public function show(Request $request)
    {

        return view('admin.users.show',['users' => $request]);
    }
    
    public function __invoke(UserTokenRequest $user)
    {
        $user = new User;
        $user->api_token = Str::random(90);

        return redirect()->route('users.show')->response()->json([
            $user->api_token,
            'messages', 'Se ha Creado el Token exitosamente'
        ]);
    }
}
