@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card mt-5 mb-5">
        <div class="card-header">{{ __('Nuevo Producto') }}</div>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data" action="{{ route('createproducts') }}">
            @csrf
            {{-- @method('PATCH') --}}

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Adjuntar Imagen') }}</label>

              <div class="col-md-6">

                <div class="custom-file">
                  <input name="img" type="file" class="@error('img') is-invalid @enderror  col-md-6 custom-file-input"
                    required id="customFile">
                  <label class="custom-file-label" for="customFile">Seleccionar Archivo</label>
                </div>

                @error('img')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror

              </div>
            </div>

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

              <div class="col-md-6">
                <input id="name" type="text" class="@error('name') is-invalid @enderror form-control" name="name"
                  value="{{ old('name') }}" autocomplete="name">

                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('description') }}</label>

              <div class="col-md-6">
                <input id="description" type="text" class="@error('description') is-invalid @enderror form-control"
                  name="description" value="{{ old('description') }}" autocomplete="description">
                @error('description')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('price') }}</label>

              <div class="col-md-6">
                <input id="price" type="text" class="@error('price') is-invalid @enderror form-control" name="price"
                  value="{{ old('price') }}" autocomplete="price">
                @error('price')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Register') }}
                </button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection