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
            <label for="exampleInputEmail1">Actualizar</label>
            <input name="nombre" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                value="{{$user->name}}">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Actualizar</label>
            <input name="nombre" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                value="{{$user->email}}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>

        <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
    </form>
    <!--EndFORM-->

</div>
@endsection