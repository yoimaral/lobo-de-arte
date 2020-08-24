<?php

namespace App\Http\Controllers\Admin;


use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SaveProductRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

use function Symfony\Component\String\b;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $products = trim($request->get('product'));
        /* trim para eliminar los campos que vengan en blanco */

        $products = Product::orderby('id', 'ASC')
            /* Con el get traigo todos los productos y withTrashed para que traiga todos los productos que hayan sido eliminados */
            ->products($products)
            ->paginate();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProductRequest $request)
    {
        $product = new Product;

        $product->img = $request->file('img')->store('images');
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        $product->save();

        return back()->with('message', 'Ha sido exitosamente creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        /* Validando si es el index del home product */
        // return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product, SaveProductRequest $request)
    {
        if ($request->hasFile('img')) {

            Storage::delete($product->img);

            $product->fill($request->validated()); /* Se rellenan todos los campos sin guardar los en la base de datos */

            $product->img = $request->file('img')->store('images');

            $product->save();

            $image = Image::make(storage::get($product->img))
                ->widen(600)
                // Para redimencionar el ancho de la imagen
                ->LimitColors(255)
                ->encode();
            /* Para poder volver a codificar el contenido de la iamgen ya sea png,IMG_JPG */

            Storage::put($product->img, (string) $image); /* sobre escribimos la imagen que acabamos de redimencionar con image y la guardamos */
        } else {
            $product->update(array_filter($request->validated()));
        }

        return back()->with('message', 'Ha sido exitosamente actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        $product->delete();

        return redirect()->route('products.index')->with('message', 'Ha sido exitosamente eliminado');


        // $product = Product::withTrashed()->where('id', $id)->get()->first();
        // if ($product->deleted_at) {
        //     $product->restore();
        //     /* findOrFile para seleccionar el producto a habilitar nuevamente */
        //     /* restore Para restaurar el producto */
        //     return redirect()->route('products.index')->with('message', 'Ha sido exitosamente habilitado');
        // } else {
        //     $product->delete();
        //     return redirect()->route('products.index')->with('message', 'Ha sido exitosamente inhabilitado');
        // }
    }
}
