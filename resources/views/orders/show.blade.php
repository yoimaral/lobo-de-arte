@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h3><strong>Estado de tu pedido</strong></h3>

            <div class="mt-4">
                <h5>{{$consul["status"]["message"]}}</h5>
            </div>

        </div>


        <div class="col-sm-6">
            <table class="table">
                <thead>
                    <tr>
                        <th>Referencia</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$consul["requestId"]}}</td>
                        <td>{{$consul["status"]["status"]}}</td>
                        <td><a href=""><button type="button" class="btn btn-outline-success">Reintentar</button></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <a class="btn btn-dark" href="{{route('orders.index')}}">Volver</a>
</div>

@endsection