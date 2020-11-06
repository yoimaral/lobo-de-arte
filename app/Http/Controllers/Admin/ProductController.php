<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductExport;
use App\Exports\UsersExport;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SaveProductRequest;
use App\Http\Controllers\Controller;
use App\Imports\ProductImport;
use Illuminate\Http\Request;
use App\Product;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request): \Illuminate\View\View
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
     * @return view
     */
    public function create()
    {
        return view('admin.products.create');
    }


    /**
     * Undocumented function
     *
     * @param SaveProductRequest $request
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

        return redirect()->route('products.create')->with('message', 'Ha sido exitosamente creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function show()
    {
    }

 
    /**
     * Undocumented function
     *
     * @param Product $product
     * @return \Illuminate\View\View
     */
    public function edit(Product $product): \Illuminate\View\View
    {
        return view('admin.products.edit', compact('product'));
    }


    /**
     * Undocumented function
     *
     * @param SaveProductRequest $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SaveProductRequest $request, Product $product): \Illuminate\Http\RedirectResponse
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

        return redirect()->route('products.index')->with('message', 'Ha sido exitosamente actualizado');
    }


    /**
     * captura el id del producto y
     * Se actualiza el estado pasando de 
     * activo a inactivo
     *
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function state(Product $product): \Illuminate\Http\RedirectResponse
    {
        $product->disabled_at = $product->disabled_at ? null : now();
        $product->save();
        return back();
    }


    /**
     * Se resive el ID del producto 
     * y se elimina de la base de datos
     * y devuelve el mensaje de validación
     *
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product): \Illuminate\Http\RedirectResponse
    {

        $product->delete();

        return redirect()->route('products.index')->with('message', 'Ha sido exitosamente eliminado');
    }

        public function export() 
    {
    return (new ProductExport)->download('product.xlsx');

         /* (new UsersExport)->store('users.xlsx', 'public'); Por si lo quiero realizar des del disco publico*/
        
        /* return redirect()->back()->with('message', 'Se ha Exportado exitosamente');  */
    }

        public function import(Request $request)
    {

        $file = $request->file('prod_File_Import');

        /* (new ProductImport())->import('product.csv'); */
        Excel::import(new ProductImport, $file );
        
        return redirect()->route('products.index')->with('messages', 'Se ha Importado exitosamente'); 
    }
}
