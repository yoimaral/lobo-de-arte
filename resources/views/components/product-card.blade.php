@if( !isset ($cart) || $cart->products->isEmpty())
<div class="alert alert-warning">
    No hay productos agregados.
</div>
@else

<!---FOREACH-->
<div class="row">
    @foreach($cart->products as $product)
    <div class="col col-3 my-4">
        <div class="col card border-0 h-100">
            @if (substr($product->img, 0, 5) == 'https')
            <img class="col my-2" src="{{$product->img}}" alt="">
            @else
            <img class="col my-2" src="/storage/{{$product->img}}" alt="">
            @endif
            <div class="card-body">
                <h2 class="card-title">{{$product->name}}</h2>
                <p class="card-text"><strong> Descripción: </strong>{{$product->description}}.</p>
                <div class="modal-dialog modal-xl"><strong> Stock: </strong>{{$product->stock}}</div>
                <div class="modal-dialog modal-xl"><strong> Price: </strong>${{$product->price}} USD</div>

                <a href="{{route('home.show',$product)}}" class="btn btn-primary">Detalle</a>

                <form action="{{route('products.carts.destroy',['cart' => $cart->id, 'product' => $product->id])}}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button class=" btn btn-primary">Remover del Carrito</button>
                </form>

            </div>
        </div>
    </div>
    @endforeach
</div>

@endif
<!---ENDFOREACH-->