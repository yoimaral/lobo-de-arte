@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-center my-3">
        <a href="{{route('products.create')}}" type="button" class="btn btn-info">Crear un nuevo producto</a>
    </div>
    <table class="table table-dark">
        <thead>
            <tr>
                <th>#</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <td scope="row">{{$product->id}}</td>
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
                    @if ($product->disabled_at)
                    Disabled {{$product->disabled_at->diffForHumans()}}
                    @else
                    Enabled
                    @endif
                </td>
                <td scope="col" class="btn">
                    <a href="{{route ('products.edit', $product)}}">Edit</a>
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