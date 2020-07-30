<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveProductRequest;

use App\Product;

class ProductsController extends Controller
{

    public function viewcreateproducts()
    {
        return view('admin.create_products');
    }

    public function createproducts(SaveProductRequest $request)
    {

        $product = new Product($request->validated());

        $product->img = $request->file('img')->store('images');
        $product->save();
        return back();
    }


    // Mostrar imagenes de productos

    public function products()
    {
        $products = Product::all();
        return view('cart.products', compact('products'));
    }

    public function detail($id)
    {
        $product = Product::find($id);
        return view('cart.Detail_Product', compact('product'));
    }

    public function carrito()
    {
        return view("cart.carrito");
    }

    public function addToCarrito($id)
    {
        $product = Product::find($id);
        $cart = session()->get("carrito");


        if (!$cart) {

            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "img" => $product->img

                ]
            ];

            session()->put("carrito", $cart);

            return redirect()->back()->with("success", "Products added to car successfully!");
        }

        if (isset($cart[$id])) {

            $cart[$id]["quantity"]++;
            session()->put("carrito", $cart);

            return redirect()->back()->with("success", "Products added to car successfully");
        }

        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "img" =>  $product->img
        ];

        session()->put("carrito", $cart);

        return redirect()->back()->with("success", "Products added to car successfully");
    }
}
