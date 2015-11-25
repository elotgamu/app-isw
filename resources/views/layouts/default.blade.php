<html>
  <head>
      @include('includes.head')
  </head>

    <body class="index">
      
        <!-- Navigation y header-->
        <header>
        
            <div class="row">
                @include('includes.header')
            </div>
        
        </header>
      
        <!--contenido-->
        <div class="row">
            @yield('content')
        </div>

        <div class="container">
            <footer>
                @include('includes.footer')
            </footer>
        </div>
      
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="//code.jquery.com/jquery.js"></script>
        <script src="https://raw.githubusercontent.com/igorescobar/jQuery-Mask-Plugin/master/src/jquery.mask.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        {!! Html::script('js/bootstrap.min.js') !!}
        {!! Html::script('js/main.js') !!}
    </body>
</html>
