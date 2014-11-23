@extends ('admin/layout')

@section ('title') {{ $action }} Usuarios @stop

@include ('admin/users/errors', array('errors' => $errors))

@section ('content')

<h1>{{ $action }} Usuarios</h1>

@if ($action == 'Editar')
{{ Form::model($user, array('route' => array('admin.users.destroy', $user->id), 'method' => 'DELETE', 'role' => 'form')) }}
<div class="row">
    <div class="form-group col-md-4">
        {{ Form::submit('Eliminar usuario', array('class' => 'btn btn-danger')) }}
    </div>
</div>
{{ Form::close() }}
@else
<p>
    <a href="/login" class="btn btn-info">Iniciar sesión</a>
</p>
@endif

{{ Form::model($user, $form_data, array('role' => 'form')) }}

<div class="row">
    <div class="form-group col-md-4">
        {{ Form::label('email', 'Dirección de E-mail') }}
        {{ Form::text('email', null, array('placeholder' => 'Introduce tu E-mail', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('full_name', 'Nombre completo') }}
        {{ Form::text('full_name', null, array('placeholder' => 'Introduce tu nombre y apellido', 'class' => 'form-control')) }}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        {{ Form::label('password', 'Contraseña') }}
        {{ Form::password('password', array('class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('password_confirmation', 'Confirmar contraseña') }}
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
    </div>
</div>
{{ Form::button($action . ' usuario', array('type' => 'submit', 'class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop