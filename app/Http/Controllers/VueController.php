<?php

namespace App\Http\Controllers;


class VueController extends Controller
{
    /**
     * Para que elusuario no ingrese a las rutas 
     * si no esta autenticado
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {

    return view('api.vue');
    }

}
