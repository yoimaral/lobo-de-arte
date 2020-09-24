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
     * Para asegurarme que des de los controladores tampoco se pueda acceder a lasrutas sin estar autenticado
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Devuelve una peticion de busqueda 
     * junto con los productos que hay en la DB
     *
     * @param Request $request
     * @return void
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
     * Retorna a la vista create
     *
     * @return void
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * se valida con el SaveProductRequest la información
     * y luego se crea un producto nuevo
     * 
     * @param SaveProductRequest $request
     * @return void
     */
    public function store(SaveProductRequest $request)
    {

        $product = new Product;

        $product->img = $request->file('img')->store('images');
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;

        $product->save();

        /* $product = Product::create(request()->all()); */

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
    }


    /**
     * 
     * Recibe y devuelve un ID con la información del producto
     *a lavista edit
     * 
     * @param Product $product
     * @return void
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }


    /**
     * Se validan los datos con el request y 
     * luego se actualizan en la BD
     * 
     * @param Product $product
     * @param SaveProductRequest $request
     * @return void
     */
    public function update(SaveProductRequest $request, Product $product)
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
     * captura el id del producto y
     * Se actualiza el estado pasando de 
     * activo a inactivo
     *
     * @param Product $product
     * @return void
     */
    public function state(Product $product)
    {
        $product->disabled_at = $product->disabled_at ? null : now();
        $product->save();

        // $state->update([
        //     'disabled_at' => $stated
        // ]);
        return back();
    }


    /**
     * Se resive el ID del producto 
     * y se elimina de la base de datos
     * y devuelve el mensaje de validación
     *
     * @param Product $product
     * @return void
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
