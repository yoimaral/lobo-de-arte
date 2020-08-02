@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Welcom your the user</h1>

    <table class="table table-dark">
        <thead>
            <tr>
                <td>

                    <form action="{{route('users.index')}}" method="GET" class="form-inline float-right" pull="right">
                        <input name="name" type="search" class="form-control ds-input border-info" id="search-input"
                            placeholder="Search..." aria-label="Search for..." autocomplete="off"
                            data-docs-version="4.5" spellcheck="false" role="combobox" aria-autocomplete="list"
                            aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0" dir="auto"
                            style="position: relative; vertical-align: top;">

                    </form>
                </td>
            </tr>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>E-mail</th>
                <th>Type User</th>
                <th>Verificación de E-mail</th>
                <th>Estado de la cuenta</th>
                <th>Fecha de creacion</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr scope="row">
                <td>{{$user->id}}</td>
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
                <td>
                    <div class="custom-control custom-checkbox">

                        <form action="{{route('users.update', $user)}}" method="POST">
                            <label><input class="form-check-input position-static" type="checkbox" id="blankCheckbox">
                                Enable &
                                Disable</label>
                        </form>

                    </div>
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