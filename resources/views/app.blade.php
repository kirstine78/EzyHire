<!DOCTYPE html>
<html lang="en">
<head>
	<!--
		Student name:    Kirstine Brørup Nielsen
		Student id:      100527988
		Date:            18.10.2016
		Assignment:      EzyHire
		Version:         1.0
		File:            app.blade.php  -  the master page
	-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EzyHire</title>
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/main.css') }}" rel="stylesheet">

	<script src="{{ asset('/js/jquery-3.1.1.js') }}"></script>
	<script src="{{ asset('/js/bootstrap.js') }}"></script>
</head>
<body class="body_bg">

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img id="logoCar" src="{{URL::asset('/img/logo.jpg')}}" alt="profile Pic"  >
			</div>

			<div class="col-md-4">
				<div class="heading_bar" id="titleBanner"><h1 class="title">EzyHire</h1></div>
			</div>
		</div>
	</div>


	<nav class="navbar navbar-default custom_nav_bar">

		<div class="container-fluid">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="nav_buttons"><a href="{{ url('/') }}" style="color:black;">Home</a></li>
					<li class="nav_buttons"><a href="{{ url('suburbs') }}"  style="color:black;">Suburbs</a></li>
					<li class="nav_buttons"><a href="{{ url('brands') }}"  style="color:black;">Brands</a></li>
					<li class="nav_buttons"><a href="{{ url('customers') }}" style="color:black;">Customers</a></li>
					<li class="nav_buttons"><a href="{{ url('vehicles') }}" style="color:black;">Vehicles</a></li>

					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:black;">Report
							<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li class="nav_buttons"><a href="{{ url('report/damage') }}"  style="color:black;">Damage Report</a></li>
							<li class="nav_buttons"><a href="{{ url('report/fault') }}"  style="color:black;">Fault Report</a></li>
						</ul>
					</li>

					<li class="nav_buttons"><a href="{{ url('list') }}" style="color:black;">Lists</a></li>

					{{--<li class="dropdown">--}}
						{{--<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:black;">List--}}
							{{--<span class="caret"></span></a>--}}
						{{--<ul class="dropdown-menu">--}}
							{{--<li class="nav_buttons"><a href="{{ url('list') }}"  style="color:black;">Bookings by Customer</a></li>--}}
							{{--<li class="nav_buttons"><a href="{{ url('list/damages') }}"  style="color:black;">Damages by Customer</a></li>--}}
						{{--</ul>--}}
					{{--</li>--}}

					<li class="nav_buttons"><a href="{{ url('archive') }}" style="color:black;">Archive</a></li>
					<li class="nav_buttons"><a href="{{ url('register') }}" style="color:black;">Register</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li class="nav_buttons"><a href="{{ url('login') }}"></span>Login</a></li>
					<li class="nav_buttons"><a href="{{ url('logout') }}"></span>Logout</a></li>
				</ul>

			</div>

		</div>

	</nav>

	@yield('content')

	@yield('page-script')
	{{--@yield('page-script-damages-report')--}}
	{{--@yield('page-script-faults-report')--}}


	<footer class="navbar-fixed-bottom"  id="myFooter">
		<div class="container">
			<p class="text-muted" style="color: #ffffff">Kirstine Brørup Nielsen 100527988</p>
		</div>
	</footer>

	{{--<div class="panel-footer">--}}
		{{--<div class="container">--}}
			{{--Kirstine Brørup Nielsen 100527988--}}
		{{--</div>--}}
	{{--</div>--}}

	<!-- Scripts -->

</body>
</html>
