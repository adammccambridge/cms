<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@if($page->meta_description){{ $page->meta_description }}@endif">
    <meta name="keywords" content="@if($page->meta_keywords){{ $page->meta_keywords }}@endif">
    <meta name="author" content="">

    <title>@if($page->meta_title){{ $page->meta_title }} @else Admin | Dashboard @endif</title>

    <link href="{{ asset('css/site.css') }}" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="/assets/js/html5shiv.js"></script>
      <script src="/assets/js/respond/respond.min.js"></script>
    <![endif]-->

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="/assets/ico/favicon.png">
  </head>
  <body>

    <header>
      <div class="logo">
        Logo
      </div>
    </header>

    <nav class="navbar navbar-default" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-admin-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-admin-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="{{ action('PagesController@index') }}">Pages</a></li>
          <li><a href="#">Images</a></li>
          <li><a href="#">Site Settings</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>

    @yield('content')

    <footer>
    </footer>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script src="{{ asset('js/site.js') }}"></script>
    @yield('scripts')
  </body>
</html>