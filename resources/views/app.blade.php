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
	<link href="{{ asset('/css/dcalendar.picker.css') }}" rel="stylesheet">

	<script src="{{ asset('/js/jquery-3.1.1.js') }}"></script>
	<script src="{{ asset('/js/bootstrap.js') }}"></script>
	<script src="{{ asset('/js/dcalendar.picker.js') }}"></script>

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

					@if ($isUserLoggedIn)
						@if ($isUserAdmin == false)
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
						@else
							<li class="nav_buttons"><a href="{{ url('archive') }}" style="color:black;">Archive</a></li>
							<li class="nav_buttons"><a href="{{ url('/register') }}" style="color:black;">Register</a></li>
						@endif
					@endif
				</ul>

				<!-- Right Side Of Navbar -->
				<ul class="nav navbar-nav navbar-right">
					<!-- Authentication Links -->
					@if (Auth::guest())
						<li><a href="{{ url('/login') }}">Login</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								{{ Auth::user()->name }} <span class="caret"></span>
							</a>

							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="{{ url('/logout') }}"
									   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
										Logout
									</a>

									<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
									</form>
								</li>
							</ul>
						</li>
					@endif
				</ul>

			</div>

		</div>

	</nav>

	@yield('content')

	@yield('page-script')


	<footer class="navbar-fixed-bottom"  id="myFooter">
		<div class="container">
			<p class="text-muted" style="color: #ffffff">Kirstine Brørup Nielsen 100527988</p>
		</div>
	</footer>

</body>
</html>
