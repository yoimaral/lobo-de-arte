@extends('layouts.app')

@section('content')
<div class="container col-md-4">

    <!--FORM-->
    <form action="{{route('users.update', $user)}}" method="POST">
        {{-- Le pasamos el $usuario del controlador para que me actualice la información --}}

        @method('PATCH')
        {{-- Me realiza la comversion de POST a PATCH ya que no me lo permite enviar como POST y se le pone el @method('PATCH') --}}

        @csrf {{-- Para que permita enviar el formulario ya que larabel no lo permite por seguridad --}}

        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp"
                value="{{$user->name}}">
            <input type="text" name="trick" hidden value="trick">
        </div>

        <div class="form-group">
            <label for="exampleInputName">Api_token</label>
            <input name="apiToken" type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp"
                placeholder="N U L L" value="{{$user->api_token}}">
            <input type="text" name="trick" hidden value="trick">
        </div>

        {{--  <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                value="{{$user->email}}">
</div> --}}

<div class="row">

    <div class="col">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>

    <div class="col">
        <a href="{{route('users.index')}}" class="btn btn-secondary" type="button">Cancelar</a>
    </div>

    <div class="col">
        <a href="{{route('users.token',$user)}}" class="btn btn-success">Crear Token</a>
    </div>
</div>
<!--EndFORM-->

</div>
@endsection