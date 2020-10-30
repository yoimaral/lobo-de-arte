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
                        <th>Total</th>
                        @if ($consul['status']['status'] != 'APPROVED')
                        <th>Acciones</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$consul["requestId"]}}</td>
                        <td>{{$order->status}}</td>
                        <td class="text-secondary">${{number_format($consul["request"]["payment"]["amount"]["total"])}}
                        </td>
                        @if ($consul['status']['status'] != 'APPROVED' && $consul['status']['reason'] != 'PT')
                        <td>
                            <form action="{{route('orders.repeatPayment', ['order'=>$order])}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-success">Reintentar</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <a class="btn btn-dark" href="{{route('orders.index')}}">Volver</a>
</div>

@endsection