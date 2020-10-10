@extends('layouts.app')

@section('content')

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>RequestId</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">{{$order->id}}</td>
                <td>{{$consul['status']['message']}}</td>
                <td>{{$consul->total}}</td>
            </tr>
        </tbody>
    </table>
    <a class="btn btn-dark" href="{{route('orders.index')}}">Volver</a>
</div>

@endsection