<!doctype html>
<html lang="en">
<head>
	<title>90 Days Goal @if (isset($page_title)) - {{ $page_title }} @endif</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
	<script src="js/bootstrap.min.js"></script>
	<style>

    body{
    	padding-top: 60px;
    }

    </style>
</head>
<body>

	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="#">90daysgoal</a>
				@if (Auth::guest())
					{{ Form::open('login', 'POST', array('class'=>'navbar-form pull-right')) }}
					{{ Form::text('username', '', array('placeholder'=>'Username','class'=>'span2')) }}
					{{ Form::password('password', array('placeholder'=>'Password','class'=>'span2')) }}
					{{ Form::submit('Login') }}
					{{ Form::close() }}
				@else
					<div class="pull-right">
						Hello {{ Auth::user()->username }}
					</div>
				@endif
			</div>
		</div>
	</nav>

	<div>
		@yield('content')
	</div>
</body>
</html>