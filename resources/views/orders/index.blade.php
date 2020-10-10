@extends('layouts.app')

@section('content')

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>RequestId</th>
                <th>Total</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td scope="row">{{$order->id}}</td>
                <td>{{$order->requestId}}</td>
                <td>${{$order->total}}</td>
                <td><a href="{{route('orders.show', $order)}}">Ver</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection