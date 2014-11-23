@extends ('admin/layout')

@section ('title') Crear Usuarios @stop

@if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Por favor corrige los siguentes errores:</strong>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@section ('content')

<h1>Crear Usuarios</h1>

{{ Form::model($user, array('route' => 'admin.users.store', 'method' => 'POST'), array('role' => 'form')) }}

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
{{ Form::button('Crear usuario', array('type' => 'submit', 'class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop