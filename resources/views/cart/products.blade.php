@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class=" col-md-12 col-4">
      <div class="card">
        <div class="card-header">Products</div>

        <a href="{{ route("viewcreateproducts") }}" class="btn btn-secondary btn-lg btn-block role=" button
          aria-pressed="true">New Products</a>

        <a href="{{ route("carrito") }}" class="btn btn-secondary btn-lg btn-block role=" button
          aria-pressed="true">Carrito
          de compras</a>


        <div class="row">{{-- card-body --}}
          @foreach ($products as $product)

          <div class="col-4">
            @if($product->img) {{--Me aseguro de que no muestre la imagen con campos NULL de la base de datos --}}
            <img src="/storage/{{$product->img}}" width="300" height="300">
            @endif
            <h4> {{$product->name}}</h4>

            <p>{{$product->description}}</p>

            <p> <strong>Precio: </strong> ${{number_format($product->price)}} </p>

            <a href="{{ route("addCarrito",$product->id) }}" class="btn btn-primary btn-lg btn-block" role="button"
              aria-pressed="true">Agregar al carrito</a>

            <a href="{{ route("detail",$product) }}" class="btn btn-secondary btn-lg btn-block role=" button
              aria-pressed="true">Detalle</a>
          </div>
          @endforeach
        </div>


      </div>
    </div>
  </div>
</div>
@endsection