<html>
  <head>
    @include('includes.head')
  </head>

  <body class="index">
      
      <div class="container">
        <header class="row">
            <!-- header del sitio -->
            @include('includes.header')
        </header>
      </div>
      
    <div class="row">
        <!--contenido-->
        @yield('content')
    </div>
    
    <!-- Footer -->
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
