@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Welcom your the user</h1>

    <div class="row">

        <div class="col mb-1">
            <form action="{{route('users.index')}}" method="GET" class="form-inline float-right" pull="right">
                <input name="name" type="search" class="form-control ds-input border-darck mb-1 border-3"
                    id="search-input" placeholder="Search..." aria-label="Search for..." autocomplete="off"
                    data-docs-version="4.5" spellcheck="false" role="combobox" aria-autocomplete="list"
                    aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0" dir="auto"
                    style="position: relative; vertical-align: top;">
            </form>
        </div>

        <div class="col-2 mb-1">
            @if (Route::has('register'))
            <a class="btn btn-info" type="button" href="{{ route('users.create') }}">Crear nuevo usuario</a>
            @endif
        </div>

        <div class="col mb-1">
            <a href="{{route('users.export')}}" class="btn btn-info" type="button">Exportar Usuarios</a>
        </div>

        <div class="col-5 mb-1">
            <form action="{{route('users.import')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <input name="user_File_Import" type="file" accept=".csv,.xlsx" required>

                <button class="btn btn-info" type="submit">Importar Usuarios</button>
            </form>
        </div>

    </div>

    <table class="table table-dark">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>E-mail</th>
                <th>Type User</th>
                <th>Verificación de E-mail</th>
                <th>Estado de la cuenta</th>
                <th>Api Token</th>
                <th>Fecha de creacion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>
                    {{$user->name}}
                </td>
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

                <td>
                    {{$user->tokens}}
                </td>

                <td>
                    {{$user->created_at}}
                </td>

                <td>
                    <input name="estado" type="checkbox" class="form-check-input"
                        onchange="event.preventDefault(); document.getElementById('{{$user->id}}').submit();"
                        {{$user->disabled_at ? '' : 'checked'}}>
                    @if ($user->disabled_at)
                    Inhabilitado
                    @else
                    Habilitado
                    @endif
                    <form id="{{$user->id}}" action="{{route('users.update',$user)}}" method="POST"
                        style="display: none;">
                        @csrf
                        @method('PATCH')
                        <input name="name" type="text" value="{{old('name', $user->name)}}">
                    </form>
                </td>

                <td>
                    <a class="btn btn-outline-secondary" href="{{route ('users.edit', $user)}}">Edit</a>
                </td>

                <td>
                    <form action="{{route ('users.destroy', $user)}}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger mt-2">Eliminar</button>

                    </form>

                </td>
            </tr>
            @empty
            No hay Usuarios
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $users->links() }}
    </div>

</div>

@endsection