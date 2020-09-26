@extends('layouts.app')

@section('content')
<!---FOREACH-->
<h3 class="text-center"><strong>Gran Total: $</strong> {{$order->Total}} </h3>

<div class="text-center mb-3">
    <form class="d-line" action="{{route ('orders.store')}}" method="POST">
        @csrf
        <button class=" btn btn-primary">Confirmar orden</button>
    </form>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Pintura</th>
                <th scope="col">Name</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Total$</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart->products as $product)
            <tr>
                <td>
                    <div class="orders-image">
                        @if (substr($product->img, 0, 5) == 'https')
                        <img src="{{$product->img}}" width="100" alt="">
                        @else
                        <img src="/storage/{{$product->img}}" width="100" alt="">
                        @endif
                    </div>
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->pivot->quantity }} </td>
                <td>${{ $product->price }}</td>
                <td><Strong>${{ $product->total }} USD </strong></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

<!---ENDFOREACH-->
@endsection