<html>
  <head>
    @include('includes.head')
  </head>

  <body class="index">
      <!--header del sitio-->
      @include('includes.header')
      <!--contenido-->
      @yield('content')
      <!--</header>-->
    <!-- Footer -->
      <div class="container">
               @include('includes.footer')
      </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        {!! Html::script('js/bootstrap.min.js') !!}
        {!! Html::script('js/main.js') !!}
  </body>
</html>
