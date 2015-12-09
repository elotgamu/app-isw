<html>
  <head>
    <title>@yield('title', 'Aprendiendo Laravel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {!! HTML::style('css/bootstrap.min.css') !!}
    {!! HTML::style('css/bootstrap-theme.css') !!}
    {!! HTML::style('css/bootstrap-theme.min.css') !!}
    {!! Html::style('css/bootstrap.css') !!}
    {!! Html::style('css/main.css') !!}
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
  </head>

  <body class="index">
    <!-- Navigation -->
    <div class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Plataforma gastronomica publicitaria</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="#menu-toggle" id="menu-toggle">Opciones</a></li>
                  <li><a href="#">Perfil</a></li>
                  <li><a href="#">Configuraciones</a></li>
                  <li><a href="#">Usuarios</a></li>
                  <li><a href="#">Ayuda</a></li>

                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                          <li>
                              <a href="#">Ver perfil</a>
                          </li>
                          <li>
                              <a href="#">Cerrar Sesión</a>
                          </li>
                      </ul>
                  </li>
                </ul>
            </li>
        </ul>
    </div>
            <!-- /.navbar-collapse -->
</div>
        <!-- /.container -->
</div>
     <div id="wrapper">
       <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
              <br>
              <br>
              <br>
                <li>
                    <a href="{{ action("contenidosController@create") }}">Mi contenido</a>
                </li>
                <li>
                    <a href="#">Pedidos</a>
                </li>
                <li>
                    <a href="#">Reservaciones</a>
                </li>
                <li>
                    <a href="#">Categorias</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <div id="page-content-wrapper">
            <div class="container-fluid">
              <br>
              <br>
              <br>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                          @yield('worksheets')
                    </div>
                </div>
            </div>
        </div>
     </div>
      <!--<div class="col-lg-2 col-md-2 col-sm-2">
        <ul class="nav nav-pills nav-stacked">
          <li class="active" role="presentation"><a  href="{{ action("contenidosController@create") }}">Mi contenido</a></li>
          <li role="presentation"><a href="#">Pedidos</a></li>
          <li role="presentation"><a href="#">Reservaciones</a></li>
        </ul>
      </div>
      <div class="col-lg-10 col-md-10 col-sm-10">
      </div>-->
    <!--<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Reportes</a></li>
            <li><a href="#">Pedidos pendientes</a></li>
            <li><a href="#">Ver menu</a></li>
            <li><a href="#">Cargar menu</a></li>
          </ul>
        </div>
        </div>
      </div>-->
    <!--contenido-->
    <!-- Footer -->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        {!! Html::script('js/bootstrap.min.js') !!}
        {!! Html::script('js/main.js') !!}
        {!! Html::script('js/bootstrap-filestyle.min.js') !!}
        {!! Html::script('js/bootstrap-filestyle.js') !!}
        <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

  </body>
</html>
