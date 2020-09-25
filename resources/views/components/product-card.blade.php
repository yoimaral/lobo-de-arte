<div class="d-flex float-right my-1">
    <a href="{{route('orders.create')}}" type="button" class="btn btn-success">Comprar ahora
    </a>
</div>

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
                <th scope="col">Stock</th>
                <th scope="col">Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart->products as $product)
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
                        <p class="card-text"><strong> Descripción: </strong>{{$product->description}}.</p>
                    </td>

                    <td>
                        <div class="modal-dialog modal-xl"><strong> Stock: </strong>{{$product->stock}}
                        </div>
                    </td>

                    <td>
                        <div class="modal-dialog modal-xl"><strong> Price: </strong>${{$product->price}} USD
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
                            <button class=" btn btn-primary">Remover</button>
                        </form>
                    </td>

                </tr>
                @endforeach
        </tbody>
    </table>

</div>


@endif
<!---ENDFOREACH-->