@extends('layouts.app')

@section('content')
<!---FOREACH-->
<h3 class="text-center"><strong>Gran Total: $</strong> {{$order->Total}} </h3>

<div class="container">
    <div class="row my-3 ml-3">

        <form class="d-line" action="{{route ('orders.payments.store', ['order' => $order->id])}}" method="POST">
            @csrf

            <div class="col-md-6">
                <textarea name="texTarea" id="texTarea" cols="50" rows="5"
                    placeholder="Descripción de la compra"></textarea>
            </div>
    </div>

    <button class="btn btn-primary">Realizar Pago</button>
    </form>
</div>
</div>

<!---ENDFOREACH-->
@endsection