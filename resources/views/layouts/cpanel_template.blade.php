<html>
  <head>
    <title>@yield('title', 'Panel de control')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta id="token" name="token" content="{{csrf_token()}}">
    {!! HTML::style('css/bootstrap.min.css') !!}
    {!! HTML::style('css/bootstrap-theme.css') !!}
    {!! HTML::style('css/bootstrap-theme.min.css') !!}
    {!! Html::style('css/bootstrap.css') !!}
    {!! Html::style('css/sidebar.css') !!}
    {!! Html::style('css/main.css') !!}
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
  </head>

  <body>
        <!--header del sitio-->
        @include('includes.header2')
        <div class="col-sm-3 col-md-2">
  <div id="wrapper">
          <!-- Sidebar -->
     <div id="sidebar-wrapper">
         <ul class="sidebar-nav">
             <li class="sidebar-brand">
                 <a href="#">

                 </a>
             </li>
             <li>
                 <a href="#">Mi contenido</a>
             </li>
             <li>
                 <a href="#">Pedidos</a>
             </li>
             <li>
                 <a href="#">Reservaciones</a>
             </li>
         </ul>
     </div>
     <!-- /#sidebar-wrapper -->
   </div>
  </div>
        <div class="col-md-8 col-xs-8">
            @yield('worksheets')
        </div>
       <div class="col-md-2 col-xs-2">
       </div>
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        {!! Html::script('js/bootstrap.min.js') !!}
        {!! Html::script('js/main.js') !!}
        {!! Html::script('js/bootstrap-filestyle.min.js') !!}
        {!! Html::script('js/bootstrap-filestyle.js') !!}
        {!! Html::script('js/CRUD.js') !!}
        {!! Html::script('js/jquery.slimscroll.min.js') !!}
        <!-- Menu Toggle Script -->
   <script>
   $("#menu-toggle").click(function(e) {
       e.preventDefault();
       $("#wrapper").toggleClass("toggled");
   });

   $(function(){
    $('#lista_categorias').slimScroll({
        height: '400px'
    });
});

$(function(){
    $('#lista_producto').slimScroll({
        height: '500px'
    });
});

   </script>
  </body>
</html>
