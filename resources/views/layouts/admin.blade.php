<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Item Finder</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
	
	@yield('styles')

</head>

<body>

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="{{ asset('img/profile_small.jpg') }}" />
                             </span>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li class={{ Request::url() == route('admin.dashboard') ? "active" : "" }}>
                    <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span></a>
                </li>
                <li class={{ Request::url() == route('admin.shops.index') ? "active" : "" }}>
                    <a href="{{ route('admin.shops.index') }}"><i class="fa fa-home"></i> <span class="nav-label">Shops</span></a>
                </li>
				<!--
                <li class={{ Request::url() == route('admin.items.index') ? "active" : "" }}>
                    <a href="{{ route('admin.items.index') }}"><i class="fa fa-cubes"></i> <span class="nav-label">Items</span></a>
                </li>
				-->
                <li>
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to Item Finder</span>
                </li>

                <li>
                    <a href="">
                        <i class="fa fa-gears"></i> Settings
                    </a>
                </li>

                <li>
                    <a href="">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>
        </nav>
        </div>
		
		<div class="row wrapper border-bottom white-bg page-heading">
			<div class="col-lg-10">
				<h2>@yield('heading')</h2>
			</div>
			<div class="col-lg-2">

			</div>
		</div>
			
        <div class="wrapper wrapper-content animated fadeInRight">
		
			@yield('content')

        </div>
		
        <div class="footer">
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>

        </div>
        </div>


    <!-- Mainly scripts -->
    <script src="{{ asset('js/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('js/inspinia.js') }}"></script>
    <script src="{{ asset('js/plugins/pace/pace.min.js') }}"></script>

	@yield('scripts')

</body>

</html>
