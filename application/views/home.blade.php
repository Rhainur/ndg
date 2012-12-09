@layout('master')

@section('content')
	@if( Auth::guest() )
		<h1>Welcome to 90 Days Goal</h1>
	@elseif( Auth::user()->role == 1 )
		@include('admin.home')
	@else
		<div class="hero-unit">
			<h3>Welcome to 90 Days Goal</h3>
			<p>
				Blurb goes here
			</p>
		</div>
	@endif
@endsection