@extends ('/layouts.default')
@section ('title') Recupera tu contraseña @stop

@section ('content')
    <div class="landing-page-container">
        <div class="col-md-4 center-block quitar espacio3 text-center margen">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Reestablezca su contraseña olvidada</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url'=>'password_recovery']) !!}
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
                    <div class="login-form">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">@</span>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="tucorreo@electronico.com">
                        </div>
                    </div>
                    <br>
                    <div class="login-form">
                        <div class="center-block input-group">
                            {!! Form::submit('Enviar enlace a este correo', array('class'=>'btn btn-default boton')) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@stop
