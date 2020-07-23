@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Nuevo Producto') }}</div>

        <div class="card-body">
          <form method="POST" enctype="multipart/form-data" action="{{ route('createproducts') }}">
            @csrf
            {{-- @method('PATCH') --}}

            <div class="form-group row">

              <div class="col-md-6">
                <input name="img" required type="file" class="col-md-6 custom-file-input " id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>

            </div>

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

              <div class="col-md-6">
                <input id="name" type="text" required class="form-control" name="name" value="{{ old('name') }}"
                  required autocomplete="name">
              </div>
            </div>

            <div class="form-group row">
              <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('description') }}</label>

              <div class="col-md-6">
                <input id="description" type="text" class="form-control" name="description"
                  value="{{ old('description') }}" required autocomplete="description">
              </div>
            </div>

            <div class="form-group row">
              <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('price') }}</label>

              <div class="col-md-6">
                <input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}" required
                  autocomplete="price">
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