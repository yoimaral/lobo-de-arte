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

        <div class="form-group ">
            <select name="estado" class="custom-select">
                <option selected>Estado</option>
                <option value="1">Habilitar</option>
                <option value="0">Inhabilitar</option>
            </select>

        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>

        <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
    </form>
    <!--EndFORM-->

    <!--FORM Destroy-->
    <form action="{{route ('users.destroy', $user)}}" method="POST">

        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger mt-2">Eliminar</button>

    </form>
    <!--EndFORM-->

</div>
@endsection