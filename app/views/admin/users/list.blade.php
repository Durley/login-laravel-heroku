@extends ('admin/layout')

@section ('title') Lista de Usuarios @stop

@section ('content')

<h1>Lista de usuarios</h1>

<p>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Crear un nuevo usuario</a>
</p>

<table class="table table-striped">
    <tr>
        <th>Full name</th>
        <th>Email</th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->full_name }}</td>
        <td>{{ $user->email }}</td>
    </tr>
    @endforeach
</table>

{{ $users->links() }}

@stop