@extends ('admin/layout')

@section ('title') Login @stop

@include ('admin/users/errors', array('errors' => $errors))

@section ('content')

<h2 class="">Por favor, inicia sesión</h2>
<div class="container">
<form class="form-signin form-horizontal" method="post" action="/login">

    <div class="row">
        <div class="form-group col-md-4">
            {{ Form::label('email', 'Dirección de E-mail') }}
            {{ Form::text('email', null, array('placeholder' => 'Introduce tu E-mail', 'class' => 'form-control')) }}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            {{ Form::label('password', 'Contraseña') }}
            {{ Form::password('password', array('placeholder' => 'Contraseña', 'class' => 'form-control')) }}
        </div>
    </div>
</div>
<button class="btn btn-large btn-primary" type="submit">Sign in</button>
    <a href="{{ route('admin.users.create') }}" class="btn btn-info">
        {{ Form::button('Crear usuario') }}
    </a>
</form>
</div> <!-- /container -->