@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex float-right my-3">
        <a href="{{route('products.create')}}" type="button" class="btn btn-info">Crear un nuevo
            producto</a>
    </div>

    <table class="table table-dark">
        <thead>

            <tr>
                <td>
                    <form action="{{route('products.index')}}" method="GET" class="form-inline float-right"
                        pull="right">
                        <input name="product" type="search" class="form-control ds-input border-info" id="search-input"
                            placeholder="Search..." aria-label="Search for..." autocomplete="off"
                            data-docs-version="4.5" spellcheck="false" role="combobox" aria-autocomplete="list"
                            aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0" dir="auto"
                            style="position: relative; vertical-align: top;">
                    </form>
                </td>
            </tr>

            <tr>
                <th scope="col">#</th>
                <th scope="col">Request</th>
            </tr>

        </thead>
        <tbody>
            @forelse ($orders as $order)

            <tr>
                <td>{{$order->id}}</td>
                <td>
                    <a href="{{route('orders.payments.show', [$order, 1])}}">{{$order->requestId}}</a>
                </td>

            </tr>
            @empty
            No hay ordenes
            @endforelse
        </tbody>
    </table>

</div>

@endsection