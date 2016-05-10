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
    {!! Html::style('css/datepicker.css') !!}
    {!! Html::style('css/smoke.css') !!}
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
  </head>

  <body>
        <!--header del sitio-->
        @include('includes.header2')
        <div class="col-md-2 col-xs-2">
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
   </div>
  </div>
        <div class="col-md-8 col-xs-10">
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
        {!! Html::script('js/bootstrap-datepicker.js') !!}
        {!! Html::script('js/smoke.js') !!}
        {!! Html::script('js/smoke.min.js') !!}

        <!-- Menu Toggle Script -->
   <script>
   $("#menu-toggle").click(function(e) {
       e.preventDefault();
       $("#wrapper").toggleClass("toggled");
   });

   $(function(){
    var div_alto = $('#lista_categorias').height();
        $('#lista_categorias').slimScroll({
            height: '300px'
        });
});

$(function() {
  $('#dptfechahasta').datepicker({
    format: "yyyy-mm-dd"
  });
});

$(function(){
    $('#lista_producto').slimScroll({
        height: '500px'
    });
});
    </script>

    <style>
  .datepicker{z-index:1151 !important;}
</style>

  </body>
</html>
