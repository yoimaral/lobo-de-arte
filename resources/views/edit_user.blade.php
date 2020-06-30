@extends('layouts.app')

@section('content')
<div class="container col-md-4">

    <!--FORM-->
    <form action="{{route('actualizar', $usuario)}}" method="POST">
        {{-- Le pasamos el $usuario del controlador para que me actualice la información --}}

        @method('PATCH')
        {{-- Me realiza la comversion de POST ya que no me lo permite enviar como POST y se le pone el @method('PATCH') --}}

        @csrf {{-- Para que permita enviar el formulario ya que larabel no lo permite por seguridad --}}

        <div class="form-group">
            <label for="exampleInputEmail1">Actualizar</label>
            <input name="nombre" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                value="{{$usuario->name}}">
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

    <!--FORM-->
    <form action="{{route ('destroy',$usuario)}}" method="POST">

        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger mt-2">Eliminar</button>

    </form>
    <!--EndFORM-->



    {{-- <form action="{{route ('user')}}">
    <button type="submit" class="btn btn-secondary">Cancelar</button>
    </form> --}}
</div>
@endsection