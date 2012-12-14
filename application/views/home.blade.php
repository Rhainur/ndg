@layout('master')

@section('content')
	<div class="hero-unit">
		<h3>Welcome to 90 Days Goal</h3>
		<p>
			Blurb goes here
		</p>
	</div>
	<div class="row">
		<div class="span4">
			<h3>Your Challenges</h3>
			@if( !isset($user_challenges) || count($user_challenges) === 0 )
				<p class="muted">No available challenges</p>
			@endif
		</div>
		<div class="span4">
			<h3>Available Challenges</h3>
			@if( !isset($active_challenges) || count($active_challenges) === 0 )
				<p class="muted">No available challenges</p>
			@else
				<ul class="unstyled">
				@foreach( $active_challenges as $challenge )
					<li>{{ $challenge->name }} - <a href="{{ URL::to('/challenge/signup/' . $challenge->id) }}">Sign up</a></li>
				@endforeach
				</ul>
			@endif
		</div>
	</div>
@endsection