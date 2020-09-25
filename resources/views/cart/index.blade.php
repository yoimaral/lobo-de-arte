@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="">
      <div class="card">
        <div class="card-header">Carrito de compras</div>

        @include('components.product-card')

      </div>
    </div>
  </div>
</div>
@endsection