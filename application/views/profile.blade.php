@layout('master')

@section('content')
<h2>Profile</h2>
{{ Form::open('/profile/update', 'POST', array('class'=>'form-horizontal well')) }}

	<legend>Personal Info</legend>

	<div class="control-group">
		{{ Form::label('username', 'Username', array('class'=>'control-label'))}}
		<div class="controls">
			<p>
				{{ Form::text('username', Auth::user()->username, array('disabled'=>'disabled')) }}
			</p>
		</div>
	</div>

	<div class="control-group">
		{{ Form::label('email', 'Email Address', array('class'=>'control-label'))}}
		<div class="controls">
			<p>
				{{ Form::text('email', Auth::user()->email, array('disabled'=>'disabled')) }}
			</p>
		</div>
	</div>

	@if( Auth::user()->role <= 2 )
	<div class="control-group">
		<label class="control-label">Role</label>
		<div class="controls">
			<p>
				@if( Auth::user()->id == 1 || Auth::user()->role == 2 )
					{{ Form::select('role', $roles, Auth::user()->role, array('disabled'=>'disabled') ) }}
				@else
					{{ Form::select('role', $roles, Auth::user()->role ) }}
				@endif
			</p>
		</div>
	</div>
	@endif

	<div class="control-group{{ ($errors->has('dob'))?' error':'' }}">
		<label class="control-label">Date of Birth</label>
		<div class="controls">
			<p>
				{{ Form::select('dob_month', $months, $user_profile->dob_month()) }}
				<input type="number" name="dob_day" min="1" max="31" step="1" class="input-mini" placeholder="Day" value="{{ $user_profile->dob_day() }}" />
				<input type="number" name="dob_year" min="1900" max="{{ date('Y') }}" step="1" class="input-mini" placeholder="Year" value="{{ $user_profile->dob_year() }}" />
				{{ $errors->first('dob', '<span class="help-inline">:message</span>') }}
			</p>
		</div>
	</div>

	<div class="control-group{{ ($errors->has('height'))?' error':'' }}">
		{{ Form::label('height', 'Height', array('class'=>'control-label'))}}
		<div class="controls">
			<p>
				{{ Form::text('height', Converter::height($user_profile->height, 1, $user_profile->use_metric_units), array('class'=>'input-mini')) }}
				{{ $user_profile->use_metric_units?'cm':'inches' }}
				{{ $errors->first('height', '<span class="help-inline">:message</span>') }}
			</p>
		</div>
	</div>

	<div class="control-group">
		{{ Form::label('use_metric_units', 'Unit Preferences', array('class'=>'control-label'))}}
		<div class="controls">
			<p>
				{{ Form::radio('use_metric_units', '1', ($user_profile->use_metric_units==1)) }} Metric (kg/cm)
			</p>
			<p>
				{{ Form::radio('use_metric_units', '0', ($user_profile->use_metric_units==0)) }} Imperial (lb/in)
			</p>
		</div>
	</div>

	<legend>Change Password</legend>

	<div class="control-group{{ ($errors->has('current_password'))?' error':'' }}">
		{{ Form::label('current_password', 'Current Password', array('class'=>'control-label'))}}
		<div class="controls">
			<p>
				{{ Form::password('current_password') }}
				{{ $errors->first('current_password', '<span class="help-inline">:message</span>') }}
			</p>
		</div>
	</div>

	<div class="control-group{{ ($errors->has('new_password'))?' error':'' }}">
		{{ Form::label('new_password', 'New Password', array('class'=>'control-label'))}}
		<div class="controls">
			<p>
				{{ Form::password('new_password') }}
				{{ $errors->first('new_password', '<span class="help-inline">:message</span>') }}
			</p>
		</div>
	</div>

	<div class="control-group{{ ($errors->has('new_password_confirmation'))?' error':'' }}">
		{{ Form::label('new_password_confirmation', 'Confirm New Password', array('class'=>'control-label'))}}
		<div class="controls">
			<p>
				{{ Form::password('new_password_confirmation') }}
				{{ $errors->first('new_password_confirmation', '<span class="help-inline">:message</span>') }}
			</p>
		</div>
	</div>

	<div class="form-actions">
		{{ Form::submit('Save', array('class'=>'btn btn-primary')) }}
		{{ HTML::link('/', 'Cancel', array('class'=>'btn')) }}
	</div>

	@if (Session::has('message_profile_update'))
		<div class="span4">
			<div class="alert alert-success">
				{{ Session::get('message_profile_update') }}
			</div>
		</div>
	@endif

	@if (Session::has('message_password_update'))
		<div class="span4">
			<div class="alert alert-success">
				{{ Session::get('message_password_update') }}
			</div>
		</div>
	@endif

{{ Form::close() }}
@endsection
