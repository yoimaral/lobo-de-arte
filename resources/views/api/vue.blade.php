@extends('layouts.app')

@section('content')

<div class="container">

    <vue-component></vue-component>
    @include('api.edit')

</div>

@endsection