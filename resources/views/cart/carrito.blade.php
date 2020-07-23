@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Carrito de compras</div>

        <a href="{{ route("products") }}" class="btn btn-secondary btn-lg btn-block role=" button
          aria-pressed="true">Productos</a>

        {{-- Agregar al carrito --}}

        <?php $valor = 0 ?>

        @if(session("carrito"))

        <table class="table table-dark">
          <thead class="thehead-dark">
            <tr>
              <th scope="col">Product</th>
              <th scope="col">Precio Unitario</th>
              <th scope="col">Cantidad</th>
              <th scope="col">Precio Total</th>
              <th scope="col">Foto</th>

            </tr>
            <thead>

              <!---FOREACH-->
              @foreach(session("carrito") as $id=>$details)

              <?php $valor += $details["price"] * $details["quantity"] ?>

              <tr>
                <th>{{$details["name"]}}</th>
                <th>{{$details["price"]}}</th>
                <th>{{$details["quantity"]}}</th>

                <th>${{$details["price"] * $details["quantity"]}}
                </th>

                <th><img src="{{$details["img"]}}" width="50" height="50"></th>
              </tr>

              @endforeach

        </table>


        @endif
        {{-- Suma total de los productos --}}
        <table justify-alight="right">
          <th>

            <div class="badge  badge-primary text-wrap" style="width: 10ren;">

              <p></p>
              <p>Valor ${{ number_format($valor)}}</p>
              <p>IGV ${{ number_format($valor*19)}}</p>
              <p>Total ${{ number_format($valor+$valor*0.18)}}</p>

            </div>

          </th>

        </table>
        {{-- fin suma total --}}

      </div>
    </div>
  </div>
</div>
@endsection