@extends('layouts.app')

@section('content')
<!---FOREACH-->
<h3 class="text-center"><strong>Gran Total: $</strong> {{$cart->Total}} </h3>

<div class="container">
    <div class="row my-3 ml-3 d-flex justify-content-center">
        <form class="d-line" action="{{route ('orders.store')}}" method="POST">
            @csrf
            <div class="col-md-6">
                <textarea name="texTarea" id="texTarea" cols="50" rows="5" placeholder="Descripción de la compra"
                    required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Realizar Pago</button>
        </form>
    </div>
</div>
</div>

<!---ENDFOREACH-->
@endsection