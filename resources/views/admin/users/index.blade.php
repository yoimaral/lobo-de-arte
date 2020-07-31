@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Welcom your the user</h1>
    <table class="table table-dark">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>E-mail</th>
                <th>Type User</th>
                <th>Verificación de E-mail</th>
                <th>Estadode la cuenta</th>
                <th>Fecha de creacion</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td scope="row">{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if ($user->is_admin)
                    Admin
                    @else
                    User
                    @endif
                </td>
                <td>
                    @if ($user->email_verified_at)
                    Verified
                    @else
                    Not verified
                    @endif
                </td>
                <td>
                    @if ($user->disabled_at)
                    Disabled {{$user->disabled_at->diffForHumans()}}
                    @else
                    Enabled
                    @endif
                </td>
                <td>{{$user->created_at}}</td>

                <td scope="col" class="btn">
                    <a href="{{route ('users.edit', $user)}}">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection