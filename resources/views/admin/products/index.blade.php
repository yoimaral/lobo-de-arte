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
                <th scope="col">Imagen</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio</th>
                <th scope="col">Estado</th>
                <th scope="col">Eliminar</th>
                <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>
                    <div class="product-image">
                        @if (substr($product->img, 0, 5) == 'https')
                        <img src="{{$product->img}}" alt="">
                        @else
                        <img src="/storage/{{$product->img}}" alt="">
                        @endif
                    </div>
                </td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>${{$product->price}} USD</td>

                <td>
                    <input name="disabled_at" type="checkbox" class="form-check-input"
                        onchange="event.preventDefault(); document.getElementById('{{$product->id}}').submit();"
                        {{$product->disabled_at ? '' : 'checked'}}>
                    @if ($product->disabled_at)
                    Inhabilitado
                    @else
                    Habilitado
                    @endif
                    <form id="{{$product->id}}" action="{{route('state',$product)}}" method="POST"
                        style="display: none;">
                        @csrf
                        @method('PATCH')
                    </form>
                </td>

                <td>
                    <form action="{{route('products.destroy',$product)}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button value="Delete" class="btn btn-outline-secondary" type="submit" id="button-addon1">
                            Eliminar

                        </button>

                    </form>
                </td>

                <td>
                    <a class="btn btn-outline-secondary" href="{{route ('products.edit', $product)}}">Edit</a>
                </td>

                {{-- <td>
                    Metodo soft delete
                    <form action="{{route('products.destroy' , $product)}}" method="POST">
                @csrf
                @method('DELETE')

                @if ($product->deleted_at)
                <button value="delete" class="btn btn-outline-secondary" type="submit"
                    id="button-addon2">Habilitar</button>
                @else
                <button value="delete" class="btn btn-outline-secondary" type="submit"
                    id="button-addon2">Inhabilitar</button>
                @endif
                </form>
                </td> --}}


            </tr>
            @empty
            No hay productos
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>

</div>

@endsection