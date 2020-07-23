@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Details</div>

        <a href="{{ route("products") }}" class="btn btn-secondary btn-lg btn-block role=" button
          aria-pressed="true">Productos</a>

        <div class="row">

          <div class="col-6">
            <img src="/storage/{{$product->img}}" width="300" height="300">
            <h4> {{$product->name}}</h4>

            <p>{{$product->description}}</p>

            <p> <strong>Precio: </strong> ${{number_format($product->price)}} </p>

          </div>
          <a href="{{ route("addCarrito",$product->id) }}" class="btn btn-primary btn-lg btn-block" role="button"
            aria-pressed="true">Agregar al carrito</a>

        </div>

      </div>
    </div>
  </div>
</div>
@endsection