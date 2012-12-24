@layout('master')

@section('content')

<h1>{{ $challenge->name }} Signup </h1>

<br /><br />
{{ Form::open('/challenge/form_signup', 'POST', array('class'=>'form-horizontal')) }}

	{{ Form::hidden('challenge_id', $challenge->id) }}

	<div class="control-group">
		{{ Form::label('username', 'Username', array('class'=>'control-label'))}}
		<div class="controls">
			<p>
				{{ Form::text('username', Auth::user()->username, array('disabled'=>'disabled')) }}
			</p>
		</div>
	</div>

	<div class="control-group{{ ($errors->has('weight'))?' error':'' }}">
		{{ Form::label('weight', 'Weight', array('class'=>'control-label'))}}
		<div class="controls">
			<p>
				{{ Form::text('weight', Input::old('weight'), array('class'=>'input-mini')) . ' ' . Auth::user()->profile->units_weight() }}
				{{ $errors->first('weight', '<span class="help-inline">:message</span>') }}
			</p>
		</div>
	</div>

	<div class="control-group">
		{{ Form::label('goals', 'Goal(s)', array('class'=>'control-label'))}}
		<div class="controls">
			<div>
				<?php $old_input = Input::old('goals', array()); ?>
				@foreach($goals as $goal)
				<label class="checkbox">
				{{ Form::checkbox('goals['.$goal->id.']', true, isset($old_input[$goal->id])) . ' ' . $goal->name }}
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
				<?php $old_input = Input::old('diets', array()); ?>
				@foreach($diets as $diet)
				<label class="checkbox">
				{{ Form::checkbox('diets['.$diet->id.']', true, isset($old_input[$diet->id])) . ' ' . $diet->name }}
				</label>
				@endforeach
			</div>
		</div>
	</div>

	<div class="control-group">
		{{ Form::label('exercise_types', 'Exercise(s)', array('class'=>'control-label'))}}
		<div class="controls">
			<div>
				<?php $old_input = Input::old('exercise_types', array()); ?>
				@foreach($exercise_types as $ex)
				<label class="checkbox">
				{{ Form::checkbox('exercise_types['.$ex->id.']', $ex->id, isset($old_input[$ex->id])) . ' ' . $ex->name }}
				</label>
				@endforeach
			</div>
		</div>
	</div>

	<div class="control-group">
		{{ Form::label('fitness_trackers', 'Fitness Tracker(s)', array('class'=>'control-label'))}}
		<div class="controls">
			<div>
				<?php $old_input = Input::old('fitness_trackers', array()); ?>
				@foreach($fitness_trackers as $ft)
				<label class="checkbox">
				{{ Form::checkbox('fitness_trackers['.$ft->id.']', $ft->id, isset($old_input[$ft->id])) . ' ' . $ft->name }}
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
				{{ Form::radio('email_reminder', -1, Input::old('email_reminder', -1) == -1) . ' Never' }}
				</label>
				<label class="radio">
				{{ Form::radio('email_reminder', 7, Input::old('email_reminder', -1) == 7) . ' Weekly' }}
				</label>
				<label class="radio">
				{{ Form::radio('email_reminder', 30, Input::old('email_reminder', -1) == 30) . ' Monthly' }}
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