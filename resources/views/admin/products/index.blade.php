@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Welcom your the Products</h1>
    <div class="row">

        <div class="col mb-1">
            <form action="{{route('products.index')}}" method="GET" class="form-inline float-right" pull="right">
                <input name="product" type="search" class="form-control ds-input border-info" id="search-input"
                    placeholder="Search..." aria-label="Search for..." autocomplete="off" data-docs-version="4.5"
                    spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false"
                    aria-owns="algolia-autocomplete-listbox-0" dir="auto"
                    style="position: relative; vertical-align: top;">
            </form>
        </div>

        <div class="col mb-1">
            <a href="{{route('products.create')}}" type="button" class="btn btn-info">Crear un nuevo
                producto</a>
        </div>

        <div class="col mb-1">
            <a href="{{route('product.export')}}" class="btn btn-info" type="button">Exportar Productos</a>
        </div>

        <div class="col mb-1">
            <form action="{{route('product.import')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="input-group">
                    <div class="custom-file">
                        <input name="prod_File_Import" type="file" accept=".csv,.xlsx" class="custom-file-input"
                            required>
                        <label class="custom-file-label" for="inputGroupFile04">Seleccionar Archivo</label>
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit"
                            id="inputGroupFileAddon04">Button</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <table class="table table-dark">
        <thead>
            <tr>
                <td>

                </td>
            </tr>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Imagen</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio</th>
                <th scope="col">Stock</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>
                    <div class="product-image">
                        @if (substr($product->img, 4, 8) == 'products')
                        <img src="/{{$product->img}}" alt="">
                        @else
                        <img src="/storage/{{$product->img}}" alt="">
                        @endif
                    </div>
                </td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>${{$product->price}} COP</td>
                <td>{{$product->stock}}</td>
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