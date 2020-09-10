@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Details</div>

        <div class="row">

          <div class="col-6 my-3">
            @if (substr($product->img, 0, 5) == 'https')
            <img class="rounded-lg w-350%" src="{{$product->img}}" alt="">
            @else
            <img class="rounded-lg w-350%" src="/storage/{{$product->img}}" alt="">
            @endif
            <h2> {{$product->name}}</h2>

            <h6><strong> Descripción: </strong>{{$product->description}}</h6>

            <h6> <strong>Precio: </strong> ${{number_format($product->price)}} </h6>
            <h6> <strong>Stock: </strong> {{$product->stock}} </h6>

          </div>
          <a href="#" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">Add to cart</a>
          <a href="{{route('home.index')}}" class="btn btn-primary btn-lg btn-block" role="button"
            aria-pressed="true">Cancelar</a>

        </div>

      </div>
    </div>
  </div>
</div>
@endsection