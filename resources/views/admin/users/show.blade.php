@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">{{ __('My profile') }}</div>
            <div class="container col-mr-4">
                <div class="row">

                    <div class="col-md-7 mt-4 form-group">
                        <label for="exampleInputName">Your Name</label>
                        <input name="perfilName" type="text" class="form-control" id="exampleInputName"
                            aria-describedby="nameHelp" value="{{$user->name}}">
                        <input type="text" name="trick" hidden value="trick">
                    </div>

                    <div class="col-md-7 mt-4 form-group">
                        <label for="exampleInputName">Your Email</label>
                        <input name="perfilEmail" type="text" class="form-control" id="exampleInputName"
                            aria-describedby="nameHelp" value="{{$user->email}}">
                        <input type="text" name="trick" hidden value="trick">
                    </div>


                    <div class="col-md-7 mt-4 form-group">
                        <label for="exampleInputName">Your Api_token</label>
                        <input name="perfilToken" type="text" class="form-control" id="exampleInputName"
                            aria-describedby="nameHelp" placeholder="N U L L" value="{{$user->api_token}}">
                        <input type="text" name="trick" hidden value="trick">
                    </div>


                    <div class="col-md-7 mt-4 form-group">
                        <label for="exampleInputName">created at</label>
                        <input name="perfilCreated" type="text" class="form-control" id="exampleInputName"
                            aria-describedby="nameHelp" value="{{$user->created_at}}">
                        <input type="text" name="trick" hidden value="trick">
                    </div>

                </div>
            </div>



        </div>
    </div>
</div>
</div>
@endsection