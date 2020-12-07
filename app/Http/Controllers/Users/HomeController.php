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
     * Undocumented function
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request): \Illuminate\View\View
    {

        $products = trim($request->get('product'));

        $products = Product::products($products)->where('disabled_at')
            ->paginate();

        return view('home.index',compact('products'));
    }


    /**
     * Lo llame home para que la ruta me pase el objeto con la información y luego
     *lo renombro como product para que me lo muestre en la vista 
     *
     * @param Product $product
     * @return \Illuminate\View\View
     */
    public function show(Product $product): \Illuminate\View\View
    {
        return view('home.show', ['product' => $product]);
    }
}
