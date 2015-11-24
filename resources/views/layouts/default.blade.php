<html>
  <head>
    <title>@yield('title', 'Aprendiendo Laravel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {!! HTML::style('css/bootstrap.min.css') !!}
    {!! HTML::style('css/boots
    trap-theme.css') !!}
    {!! HTML::style('css/bootstrap-theme.min.css') !!}
    {!! Html::style('css/bootstrap.css') !!}
    {!! Html::style('css/main.css') !!}
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
  </head>

  <body>
    <!-- Navigation -->
    <div class="row">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ action("negocioController@create") }}">Plataforma gastronomica publicitaria</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="about.html">Catalogo de negocios</a>
                    </li>
                    <li>
                        <a href="services.html">Ultimas publicaciones</a>
                    </li>
                    <!--<li>
                        <a href="contact.html">Contact</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="portfolio-1-col.html">1 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-2-col.html">2 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-3-col.html">3 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-4-col.html">4 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-item.html">Single Portfolio Item</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="blog-home-1.html">Blog Home 1</a>
                            </li>
                            <li>
                                <a href="blog-home-2.html">Blog Home 2</a>
                            </li>
                            <li>
                                <a href="blog-post.html">Blog Post</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Other Pages <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="full-width.html">Full Width Page</a>
                            </li>
                            <li>
                                <a href="sidebar.html">Sidebar Page</a>
                            </li>
                            <li>
                                <a href="faq.html">FAQ</a>
                            </li>
                            <li>
                                <a href="404.html">404</a>
                            </li>
                            <li>
                                <a href="pricing.html">Pricing Table</a>
                            </li>-->
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
  </div>
    <!--contenido-->
    <div class="row">
        @yield('content')
    </div>

        <!-- Footer -->
        <div class="container">
           <footer>
               <div class="row">
                   <div class="col-lg-12">
                       <p>Copyright &copy; Your Website 2014</p>
                   </div>
               </div>
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
