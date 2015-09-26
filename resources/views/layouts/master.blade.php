<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Cagers Basketball Vancouver, WA. Experience excellent basketball skill building, coaches clinics, select teams and all apects of player development.">
        <title>@yield('pagetitle')</title>
        
        <!-- Bootstrap -->
        <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Optional theme -->
        <link href="{{url('css/bootstrap-theme.min.css')}}" rel="stylesheet">
        <link href="{{url('css/site.css')}}" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        @yield('alert')
        <nav class="navbar navbar-inverse">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
                <!--
                <a class="navbar-brand" href="#">Cagers Basketball</a>
                -->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                  @yield('mainmenu')
              </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/auth/login') }}">Login</a></li>
                        <li><a href="{{ url('/auth/register') }}">Register</a></li>
				    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/article/list') }}">Article List</a></li>
                                <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                            </ul>
						</li>
					@endif
				</ul>
                <!--
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Admin</a></li>
                  </ul>
                -->
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{url('img/logo.png')}}" class="img-responsive" alt="Cagers Logo">
                    <p style="text-align:center;color:#ff0000;">The <b>BEST</b> never <b>REST</b></p>
                </div>
                
                @yield('content')
            </div>
            <div class="navbar-inverse navbar-fixed-bottom">
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <h5 style="color:#ffffff;text-align:center;">&copy;Cagers Basketball</h5>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
        </div>
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{url('js/jquery-1.11.3.min.js')}}"></script>
        
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{url('js/bootstrap.min.js')}}"></script>
    </body>
</html>