@layout('master')

@section('content')
	<h1>Hello {{ Auth::user()->username }} and welcome to 90 Days Goal</h1>
@endsection