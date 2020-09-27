@extends('layouts.app')

@section('content')
<!---FOREACH-->
<h3 class="text-center"><strong>Gran Total: $</strong> {{$order->Total}} </h3>

<div class="text-center mb-3">
    <form class="d-line" action="{{route ('orders.payments.store', ['order' => $order->id])}}" method="POST">
        @csrf
        <button class=" btn btn-primary">Realizar Pago</button>
    </form>
</div>

<!---ENDFOREACH-->
@endsection