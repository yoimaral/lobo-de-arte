<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveProductRequest;
use App\Product;
use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\ProductCollection;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ProductCollection(Product::paginate(7));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProductRequest $request)
    {
        /* dd($request->validated()); */
        $product = Product::create($request->validated());

        $product->img = $request->file('img')->store('images');

        $this->optimizaImage($product->img);

        $product->save();

        return response()->json(new ProductResource($product), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json(new ProductResource($product), 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(SaveProductRequest $request, Product $product)
    {
        $product->fill($request->validated());

        if ($request->hasFile('img')){
            Storage::delete($product->img);
            $product->img = $request->file('img')->store('images');

            $this->optimizaImage($product->img);
        }

        $product->save();

        return response()->json(new ProductResource($product));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->img);
        $product->delete();

        return response()->json(null, 204);
    }

    public function optimizaImage(string $img)
    {
      $image = Image::make(Storage::get($img))
                ->widen(600)
                // Para redimencionar el ancho de la imagen
                ->LimitColors(255)
                ->encode();
            /* Para poder volver a codificar el contenido de la iamgen ya sea png,IMG_JPG */

            Storage::put($img, (string) $image);
    }
}
