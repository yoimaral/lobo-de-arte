<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductExport;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SaveProductRequest;
use App\Http\Controllers\Controller;
use App\Imports\ProductImport;
use App\Imports\ProductsImportUpdate;
use App\Jobs\NotifyUserOfCompletedExport;
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SaveProductRequest $request): \Illuminate\Http\RedirectResponse
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

        $filePath = asset('storage/products.xlsx');
        $user = auth()->user();

        (new ProductExport)->store('products.xlsx', 'public')->chain([
            new NotifyUserOfCompletedExport($user , $filePath)
        ]);
        
        return redirect()->route('products.index')->with('message', 'Hemos iniciado el proceso de EXPORTACIÓN, te enviaremos un correo cuando este listo!'); 
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function import(Request $request,Product $product)
    {

       return  $request->id = $product->id ? $this->importUpdate : $this->importCreate ;
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function importCreate(Request $request)
    {
        $file = $request->file('prod_File_Import');

        Excel::import(new ProductImport, $file );
        
        return redirect()->route('products.index')->with('message', 'Se ha Importado exitosamente!'); 
    }

    /**
     * Import products to the database
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function importUpdate(Request $request, ProductsImportUpdate $productsImportUpdate): \Illuminate\Http\RedirectResponse
    {
        $archivo = $productsImportUpdate->toCollection($request->file);
        foreach ($archivo[0] as $product) {
            Product::where('id', $product[0])->update([
             'img' => $product[1],
            'name' => $product[2],
            'description' => $product[3],
            'price' => $product[4],
            'stock' => $product[5],
            'disabled_at' => $product[6],
            ]);
        }

        return redirect()->route('products.index')->with('message', 'Se ha Importado exitosamente!');
    }
}
