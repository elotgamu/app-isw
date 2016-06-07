<!--<nav class="navbar navbar-default navbar-fixed-top"> -->
<div class="navbar navbar-inverse navbar-fixed-top">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                 <span class="sr-only">Toggle navigation</span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
            </button>
             <a class="navbar-brand page-scroll" href="{{ action("negocioController@create") }}">PGP</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling  -->

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-left">
              <li>
                <a href="#" id="menu-toggle">
                  <span class="glyphicon glyphicon-th"></span>
                </a>
              </li>
          </ul>
            <ul class="nav navbar-nav navbar-right">
                <!--comentamos el id del negocio
                pretendemos obtenerlos en el controlador
                si lees esto dime donde es mejor obtener esto-->
                <!-- <input id="negocio" type="hidden" value="{{  Auth::user()->negocio }}"> -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i> {{ Auth::user()->name }}<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ URL::to('/logout') }}"><i class="glyphicon glyphicon-lock"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
            <!-- /.navbar-collapse -->
<!--</nav> -->
</div>
