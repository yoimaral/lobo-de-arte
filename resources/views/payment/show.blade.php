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
                <th scope="col">Información del pago</th>
            </tr>

        </thead>
        <tbody>


            <tr>
                <td>
                    {{$consul['status']['message']}}
                    {{$order->requestId}}
                </td>
                {{-- 
                <td>{{$consulta->amount}}</td> --}}
            </tr>
        </tbody>
    </table>

</div>

@endsection