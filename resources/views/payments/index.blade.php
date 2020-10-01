@extends('layouts.app')

@section('content')
<!---FOREACH-->
<h3 class="text-center"><strong>Web Checkout de PlacetoPay </h3>

<div class="text-center mb-3">
    <form class="d-line" action="{{route ('orders.payments.store', ['order' => $order->id])}}" method="POST">

        <label for="Reference">Reference</label>
        <input id="payReference" name="reference" type="text">

        <label for="Reference">Reference</label>
        <input id="payDescription" name="description" type="text">

        <label for="Reference">Reference</label>
        <input id="payAmount" name="payAmount" type="number">

        <button id="buttonAmount" type="submit">Pagar</button>

    </form>
</div>

<!---ENDFOREACH-->
@endsection