@layout('master')

@section('content')
	@if( Auth::guest() )
		<h1>Welcome to 90 Days Goal</h1>
	@else
		<h1>Hello {{ Auth::user()->username }} and welcome to 90 Days Goal</h1>
	@endif
@endsection