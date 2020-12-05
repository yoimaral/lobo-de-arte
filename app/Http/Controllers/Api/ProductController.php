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
     * Undocumented function
     *
     * @param SaveProductRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(SaveProductRequest $request): \Illuminate\Http\JsonResponse
    {
        
        $product = Product::create($request->validated());

        $product->img = $request->file('img')->store('images');

        $this->optimizaImage($product->img);

        $product->save();

        return response()->json(new ProductResource($product), 201);
    }

    /**
     * Undocumented function
     *
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Product $product): \Illuminate\Http\JsonResponse
    {
        return response()->json(new ProductResource($product), 201);
    }

    /**
     * Undocumented function
     *
     * @param SaveProductRequest $request
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(SaveProductRequest $request, Product $product): \Illuminate\Http\JsonResponse
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
     * Undocumented function
     *
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Product $product): \Illuminate\Http\JsonResponse
    {
        Storage::delete($product->img);
        $product->delete();

        return response()->json(null, 204);
    }

    /**
     * Undocumented function
     *
     * @param string $img
     * @return void
     */
    public function optimizaImage(string $img): void
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
