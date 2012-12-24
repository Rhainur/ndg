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
			@if( !isset($user_entries) || count($user_entries) === 0 )
				<p class="muted">No available challenges</p>
			@else
				<ul class="unstyled">
				@foreach( $user_entries as $entry )
					<?php $challenge = $entry->challenge ?>
					<li>
						{{ HTML::link('/entry/view/' . $entry->id, $challenge->name ) }}
					</li>
				@endforeach
				</ul>
			@endif
		</div>
		<div class="span4">
			@if( Session::has('error_message') )
		    <div class="alert alert-error">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Whoops!</strong> {{ Session::get('error_message') }}
		    </div>
			@endif
			<h3>Available Challenges</h3>
			@if( !isset($active_challenges) || count($active_challenges) === 0 )
				<p class="muted">No available challenges</p>
			@else
				<ul class="unstyled">
				@foreach( $active_challenges as $challenge )
					<li>
						{{ HTML::link('/challenge/view/' . $challenge->id, $challenge->name ) }}
						@if( !$challenge->is_in($user_entries) )
						<a href="{{ URL::to('/challenge/signup/' . $challenge->id) }}" class="pull-right">
							Sign up
						</a>
						@endif
					</li>
				@endforeach
				</ul>
			@endif
		</div>
	</div>
@endsection