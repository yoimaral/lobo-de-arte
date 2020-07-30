@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row ">
    <div class=" col-md-12 col-4">
      <div class="card mt-5 mb-5">
        <div class="card-header">Products</div>

        <a href="{{ route("viewcreateproducts") }}" class="btn btn-secondary btn-lg btn-block mt-2" button
          aria-pressed="true">New Products</a>

        <a href="{{ route("carrito") }}" class="btn btn-secondary btn-lg btn-block mb-3" button
          aria-pressed="true">Carrito
          de compras</a>

        <div class="row justify-content-center justify-content-around">{{-- card-body --}}
          @foreach ($products as $product)

          <div class="card mb-2" style="width: 18rem;">
            <img src="/storage/{{$product->img}}" alt="..." width="300" height="300">
            <div class="card-body">
              <h4> {{$product->name}}</h4>
              <p>{{$product->description}}</p>
              <p> <strong>Precio: </strong> ${{number_format($product->price)}} </p>

              <a href="{{ route("addCarrito",$product->id) }}" class="btn btn-primary btn-lg btn-block" role="button"
                aria-pressed="true">Agregar al carrito</a>

              <a href="{{ route("detail",$product) }}" class="btn btn-secondary btn-lg btn-block role=" button
                aria-pressed="true">Detalle</a>
            </div>
          </div>

          @endforeach
        </div>


      </div>
    </div>
  </div>
</div>
@endsection