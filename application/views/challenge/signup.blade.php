@layout('master')

@section('content')

<h1>{{ $challenge->name }} Signup </h1>

<br /><br />
{{ Form::open('/challenge/form_signup', 'POST', array('class'=>'form-horizontal')) }}

	<div class="control-group">
		{{ Form::label('username', 'Username', array('class'=>'control-label'))}}
		<div class="controls">
			<p>
				{{ Form::text('username', Auth::user()->username, array('disabled'=>'disabled')) }}
			</p>
		</div>
	</div>

	<div class="control-group">
		{{ Form::label('weight', 'Weight', array('class'=>'control-label'))}}
		<div class="controls">
			<p>
				{{ Form::text('weight', '', array('class'=>'input-mini')) . ' ' . Auth::user()->profile->units_weight() }}
			</p>
		</div>
	</div>

	<div class="control-group">
		{{ Form::label('goals', 'Goal(s)', array('class'=>'control-label'))}}
		<div class="controls">
			<div>
				@foreach($goals as $goal)
				<label class="checkbox">
				{{ Form::checkbox('goals[]', $goal->id) . ' ' . $goal->name }}
				</label>
				@endforeach
			</div>
		</div>
	</div>

	<legend>Tell us about how you plan to achieve your goal</legend>

	<div class="control-group">
		{{ Form::label('diets', 'Diet(s)', array('class'=>'control-label'))}}
		<div class="controls">
			<div>
				@foreach($diets as $diet)
				<label class="checkbox">
				{{ Form::checkbox('diets[]', $diet->id) . ' ' . $diet->name }}
				</label>
				@endforeach
			</div>
		</div>
	</div>

	<div class="control-group">
		{{ Form::label('exercise_types', 'Exercise(s)', array('class'=>'control-label'))}}
		<div class="controls">
			<div>
				@foreach($exercise_types as $exercise_type)
				<label class="checkbox">
				{{ Form::checkbox('exercise_types[]', $exercise_type->id) . ' ' . $exercise_type->name }}
				</label>
				@endforeach
			</div>
		</div>
	</div>

	<div class="control-group">
		{{ Form::label('fitness_trackers', 'Fitness Tracker(s)', array('class'=>'control-label'))}}
		<div class="controls">
			<div>
				@foreach($fitness_trackers as $fitness_tracker)
				<label class="checkbox">
				{{ Form::checkbox('fitness_trackers[]', $fitness_tracker->id) . ' ' . $fitness_tracker->name }}
				</label>
				@endforeach
			</div>
		</div>
	</div>

	<div class="control-group">
		{{ Form::label('email_reminder', 'Email Reminder', array('class'=>'control-label'))}}
		<div class="controls">
			<div>
				<label class="radio">
				{{ Form::radio('email_reminder', -1) . ' Never' }}
				</label>
				<label class="radio">
				{{ Form::radio('email_reminder', 7) . ' Weekly' }}
				</label>
				<label class="radio">
				{{ Form::radio('email_reminder', 28) . ' Monthly' }}
				</label>
			</div>
		</div>
	</div>

	<div class="form-actions">
		{{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
		{{ HTML::link('/', 'Cancel', array('class'=>'btn')) }}
	</div>

{{ Form::close() }}

@endsection