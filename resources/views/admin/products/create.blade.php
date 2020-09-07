@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-2">
                <div class="card-header">{{ __('Create Products') }}</div>


                <form action="{{route('products.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf

                    <div class="form-group row mt-2">
                        <label for="img"
                            class="col-md-4 col-form-label text-md-right">{{ __('Adjuntar Imagen') }}</label>
                        <div class="col-md-6">

                            <div class="custom-file">
                                <input name="img" type="file" class="col-md-6 custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Seleccionar Archivo</label>
                            </div>

                        </div>
                    </div>
                    @error('img')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                                autocomplete="name" autofocus>

                        </div>
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group row">
                        <label for="description"
                            class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                        <div class="col-md-6">
                            <input id="description" type="text" class="form-control " name="description"
                                value="{{ old('description') }}" autocomplete="description">

                        </div>
                    </div>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group row">
                        <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('price') }}</label>

                        <div class="col-md-6">
                            <input id="price" type="number" class="form-control " name="price" autocomplete="new-price"
                                value="{{ old('price') }}">

                        </div>
                    </div>
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <div class="form-group row">
                        <label for="stock" class="col-md-4 col-form-label text-md-right">{{ __('stock') }}</label>
                        <div class="col-md-6">
                            <input id="stock" type="number" class="form-control " name="stock" autocomplete="new-stock"
                                value="{{ old('stock') }}">
                        </div>
                    </div>
                    @error('stock')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


            </div>

            <div class="form-group row mb-2 mt-2">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Enviar') }}
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection