@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h4><strong> Su cesta</strong></h4>
                </div>

                <div class="d-flex float-right my-1">
                    <a href="{{route('orders.create')}}" type="button" class="btn btn-success">Comprar ahora
                    </a>
                </div>
                <h3 class="text-center"><strong>Gran Total: $</strong> {{$cart->Total}} </h3>
                @if( !isset ($cart) || $cart->products->isEmpty())
                <div class="alert alert-warning">
                    No hay productos agregados.
                </div>
                @else

                <!---FOREACH-->
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Imagen</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Detalle</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($cart->products as $product)
                            <div class="card ">
                                <tr>
                                    <td>
                                        @if (substr($product->img, 0, 5) == 'https')
                                        <img class="col my-2" src="{{$product->img}}" alt="">
                                        @else
                                        <img class="col my-2" src="/storage/{{$product->img}}" alt="">
                                        @endif
                                    </td>


                                    <td>
                                        <h2 class="card-title">{{$product->name}}</h2>
                                    </td>

                                    <td>
                                        <p class="card-text"><strong> Descripción: </strong>{{$product->description}}.
                                        </p>
                                    </td>

                                    <td>
                                        <div class="modal-dialog modal-xl">{{ $product->pivot->quantity }} Articulos en
                                            tu carrito
                                            <strong> Total:
                                            </strong>({{$product->total}})
                                        </div>
                                    </td>

                                    <td>
                                        <div class="modal-dialog modal-xl"><strong> Price: </strong>${{$product->price}}
                                            USD
                                        </div>
                                    </td>

                                    <td>
                                        <a href="{{route('home.show',$product)}}" class="btn btn-primary">Detalle</a>
                                    </td>

                                    <td>
                                        <form
                                            action="{{route('products.carts.destroy',['cart' => $cart->id, 'product' => $product->id])}}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class=" btn btn-primary">Remover</button>
                                        </form>
                                    </td>

                                </tr>
                                @empty
                                No hay ordenes
                                @endforelse
                        </tbody>
                    </table>

                </div>

                @endif
                <!---ENDFOREACH-->

            </div>
        </div>
    </div>
</div>
@endsection