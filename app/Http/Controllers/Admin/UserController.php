<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $name = trim($request->get('name'));

        $users =  User::orderBy('id', 'ASC')
            ->name($name)
            ->paginate();

        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'disabled_at' => $user->disabled_at ? null : now(),
            'name' => $request->name
        ]);

        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
