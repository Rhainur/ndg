@layout('master')

@if( Auth::guest() )
	@section('content')
		<h1>Welcome to 90 Days Goal</h1>
	@endsection
@else
	@section('content')
	<div class="hero-unit">
		<h3>Welcome to 90 Days Goal</h3>
		<p>
			Blurb goes here
		</p>
	</div>
	@endsection
@endif