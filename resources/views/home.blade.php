@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-cols-1 row-cols-md-3 my-5">
        @forelse ($products as $product)
        <div class="col mb-4">
            <div class="card h-100">
                @if (substr($product->img, 0, 5) == 'https')
                <img class="rounded-lg" src="{{$product->img}}" alt="">
                @else
                <img class="rounded-lg" src="/storage/{{$product->img}}" alt="">
                @endif
                <div class="card-body">
                    <h2 class="card-title">{{$product->name}}</h2>
                    <p class="card-text">{{$product->description}}.</p>
                    <div class="modal-dialog modal-xl">${{$product->price}} USD</div>
                    <a href="{{route('products.show',$product)}}" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
        @empty
        No hay productos
        @endforelse
    </div>
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
</div>
@endsection