<!doctype html>
<html lang="en">
<head>
	<title>90 Days Goal @if (isset($page_title)) - {{ $page_title }} @endif</title>
	<link rel="stylesheet" href="/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="/css/bootstrap-datepicker.css" />
	<style>

    body{
    	padding-top: 60px;
    }

    </style>
</head>
<body>

	<nav class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="{{ URL::base() }}">90daysgoal</a>
				@if (Auth::guest())
					{{ Form::open('login', 'POST', array('class'=>'navbar-form pull-right')) }}
					{{ Form::text('username', '', array('placeholder'=>'Username','class'=>'span2')) }}
					{{ Form::password('password', array('placeholder'=>'Password','class'=>'span2')) }}
					{{ Form::submit('Login', array('class' => 'btn btn-primary')) }}
					{{ Form::close() }}
				@else
					<div class="pull-right">
						<a class="btn btn-inverse" href="{{ URL::to('/profile') }}">
							<i class="icon-user icon-white"></i> {{ Auth::user()->username }}
						</a>
						@if (Auth::user()->role == 1)
						<a class="btn btn-inverse" href="{{ URL::to('/admin') }}">
							<i class="icon-cog icon-white"></i> Admin Panel
						</a>
						@endif
						<a class="btn btn-inverse" href="{{ URL::to('/logout') }}">
							<i class="icon-off icon-white"></i> Logout
						</a>
					</div>
				@endif
			</div>
		</div>
	</nav>

	<div class="container">
		@yield('content')
	</div>

	<footer>
		<div style="text-align: center; opacity: 0.5">
			<p>
				Designed and coded by <a href="http://www.rohitnair.net">Rohit Nair</a>
			</p>
		</div>
	</footer>

	<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->
	<script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/bootstrap-datepicker.min.js"></script>
	<script src="/js/script.js"></script>
</body>
</html>