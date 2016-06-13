@extends('/layouts.default')
@section('title') Formulario cambio de contraseña @stop
@section('content')
    <div class="landing-page-container">
        <div class="col-md-3 center-block quitar espacio3 text-center margen">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Renovación de su contraseña</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url'=>'/password_reset']) !!}
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="login-form">
                        @if (count($errors) > 0)
                            <div class="alert alert-warning alert-dismissable">
                                @foreach ($errors->all() as $error)
                                    <button class="close" data-dismiss="alert">&times;</button>
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <br>
                    <div class="login-form">
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="tucorreo@electronico.com">
                        </div>
                    </div>
                    &nbsp
                    <div class="login-form">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" name="password" placeholder="ingresa tu nueva contraseña" class="form-control">
                        </div>
                    </div>
                    &nbsp
                    <div class="login-form">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" name="password_confirmation" placeholder="confirma la contraseña nueva" class="form-control">
                        </div>
                    </div>
                    &nbsp

                    <div class="login-form">
                        <div class="input-group">
                            <button type="submit" class="btn btn-default boton">Cambiar la contraseña</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
