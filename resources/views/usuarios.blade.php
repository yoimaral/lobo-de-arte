@extends('layouts.app')

@section('content')

<h1>Welcom your the user</h1>


<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">E-mail</th>
            <th scope="col">Type User</th>
            <th scope="col">Verificación de E-mail</th>
            <th scope="col">Estadode la cuenta</th>
            <th scope="col">Fecha de creacion</th>
            <th scope="col">Edit</th>

        </tr>
    </thead>
    <tbody>
        <!---FOREACH-->
        @foreach ($usuarios as $usuario)
        <tr>
            <td>{{$usuario->id}}</td>
            <td>{{$usuario->name}}</td>
            <td>{{$usuario->email}}</td>
            <!--IF--->
            @if ($usuario->is_admin )
            <td>Admin</td>
            @else
            <td>User</td>
            @endif
            <!--EndIF--->

            <!--IF--->
            @if ($usuario->email_verified_at )
            <td>Enabled</td>
            @else
            <td>Disabled</td>
            @endif
            <!--EndIF--->

            <!--IF--->
            @if ($usuario->state_enabled_at )
            <td>Enabled</td>
            @else
            <td>Disabled</td>
            @endif
            <!--EndIF--->

            <td>{{$usuario->created_at}}</td>

            <td scope="col" class="btn">
                <a href="{{route ('editar', $usuario)}}">Edit</a>
            </td>
        </tr>

        @endforeach
        <!--EndFOREACH-->


        {{-- <tr>
            <td scope="row"></td>
            <td scope="row">{{$item->name}}</td>
        <td scope="row">{{$item->email}} </td>
        </tr> --}}

    </tbody>
</table>
@endsection