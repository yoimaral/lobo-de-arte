@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="">
      <div class="card">
        <div class="card-header">
          <h4><strong> Su sesta</strong></h4>
        </div>

        @include('components.product-card')

      </div>
    </div>
  </div>
</div>
@endsection