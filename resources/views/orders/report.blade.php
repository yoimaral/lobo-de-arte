@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-2">
                <div class="card-header">{{ __('Vew Report') }}</div>


                {{-- Implement Canvast for grafic --}}
                <div class="row col-6">
                    <canvas id="myChart" width="400" height="400"></canvas>
                </div>
                {{-- End Canvast --}}


            </div>
        </div>
    </div>
</div>

@endsection