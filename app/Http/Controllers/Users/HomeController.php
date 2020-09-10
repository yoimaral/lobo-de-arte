<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $products = trim($request->get('product'));

        $products = Product::products($products)
            ->paginate();

        return view('home.index', compact('products'));
    }

    /* Lo llame home para que la ruta me pase el objeto con la información y luego
     lo renombro como product para que me lo muestre en la vista */
    public function show(Product $home)
    {
        return view('home.show', ['product' => $home]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomeController  $homeController
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeController $homeController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomeController  $homeController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeController $homeController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomeController  $homeController
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeController $homeController)
    {
        //
    }
}
