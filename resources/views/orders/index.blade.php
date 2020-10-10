@extends('layouts.app')

@section('content')

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Referencia</th>
                <th>Total</th>
                <th>Fecha de pedido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td scope="row">{{$order->id}}</td>
                <td>{{$order->requestId}}</td>
                <td>${{$order->total}}</td>
                <td>{{$order->created_at}}</td>
                <td><a href="{{route('orders.show', $order)}}">Ver</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection