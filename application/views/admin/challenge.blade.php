@layout('master')

@section('content')
	<div class="row-fluid">
		@include('admin.sidebar')
		<div class="span8">
			<h2>Active Challenges</h2>
			@if( count($active_challenges) === 0 )
				<p class="muted">No active challenges found</p>
			@else
				<ul>
					@foreach( $active_challenges as $challenge )
					<li>
						<a href="{{ URL::to('/admin/challenge/' . $challenge->id ) }}">
							{{ $challenge->name }}
						</a>
					</li>
					@endforeach
				</ul>
			@endif
			<div>
				{{ Form::open('/admin/challenge/new', 'POST', array('class'=>'')) }}

			<h3>Create a new challenge</h3>
				<div class="control-group">
					{{ Form::label('name', 'Name', array('class'=>'control-label'))}}
					<div class="controls">
						<p>
							{{ Form::text('name') }}
						</p>
					</div>
				</div>

				<div class="control-group">
					{{ Form::label('start_date', 'Start Date', array('class'=>'control-label'))}}
					<div class="controls">
						<p>
							{{ Form::text('start_date') }}
						</p>
					</div>
				</div>

				<div class="control-group">
					{{ Form::label('end_date', 'End Date', array('class'=>'control-label'))}}
					<div class="controls">
						<p>
							{{ Form::text('end_date') }}
						</p>
					</div>
				</div>

				<div>
					{{ Form::submit('Create', array('class'=>'btn btn-primary')) }}
				</div>

				{{ Form::close() }}
			</div>
		</div>
	</div>
@endsection