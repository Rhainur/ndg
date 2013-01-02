@layout('master')

@section('content')

<h1>
	Checkin
</h1>
<br />
<br />

{{ Form::open('/entry/form_checkin', 'POST', array('class'=>'form-horizontal')) }}

	{{ Form::hidden('entry_id', $entry_id) }}

	<div class="control-group{{ ($errors->has('weight'))?' error':'' }}">
		{{ Form::label('weight', 'Weight', array('class'=>'control-label'))}}
		<div class="controls">
			<div class="input-append">
				{{ Form::text('weight', Input::old('weight'), array('class'=>'input-mini')) }}
				<span class="add-on">{{ Auth::user()->profile->units_weight() }}</span>
			</div> (Required) {{ $errors->first('weight', '<span class="help-inline">:message</span>') }}
		</div>
	</div>

	<div class="control-group{{ ($errors->has('body_fat_percentage'))?' error':'' }}">
		{{ Form::label('body_fat_percentage', 'Body fat percentage', array('class'=>'control-label'))}}
		<div class="controls">
			<div class="input-append">
				{{ Form::text('body_fat_percentage', Input::old('body_fat_percentage'), array('class'=>'input-mini')) }}
				<span class="add-on">%</span>
			</div>
			{{ $errors->first('body_fat_percentage', '<span class="help-inline">:message</span>') }}
		</div>
	</div>

	<legend>Measurements</legend>

	<div class="control-group{{ ($errors->has('neck'))?' error':'' }}">
		{{ Form::label('neck', 'Neck', array('class'=>'control-label'))}}
		<div class="controls">
			<div class="input-append">
				{{ Form::text('neck', Input::old('neck'), array('class'=>'input-mini')) }}
				<span class="add-on">{{ Auth::user()->profile->units_height() }}</span>
			</div>
			{{ $errors->first('neck', '<span class="help-inline">:message</span>') }}
		</div>
	</div>

	<div class="control-group{{ ($errors->has('chest'))?' error':'' }}">
		{{ Form::label('chest', 'Chest', array('class'=>'control-label'))}}
		<div class="controls">
			<div class="input-append">
				{{ Form::text('chest', Input::old('chest'), array('class'=>'input-mini')) }}
				<span class="add-on">{{ Auth::user()->profile->units_height() }}</span>
			</div>
			{{ $errors->first('chest', '<span class="help-inline">:message</span>') }}
		</div>
	</div>

	<div class="control-group{{ ($errors->has('arm'))?' error':'' }}">
		{{ Form::label('arm', 'Arm', array('class'=>'control-label'))}}
		<div class="controls">
			<div class="input-append">
				{{ Form::text('arm', Input::old('arm'), array('class'=>'input-mini')) }}
				<span class="add-on">{{ Auth::user()->profile->units_height() }}</span>
			</div>
			{{ $errors->first('arm', '<span class="help-inline">:message</span>') }}
		</div>
	</div>

	<div class="control-group{{ ($errors->has('waist'))?' error':'' }}">
		{{ Form::label('waist', 'Waist', array('class'=>'control-label'))}}
		<div class="controls">
			<div class="input-append">
				{{ Form::text('waist', Input::old('waist'), array('class'=>'input-mini')) }}
				<span class="add-on">{{ Auth::user()->profile->units_height() }}</span>
			</div>
			{{ $errors->first('waist', '<span class="help-inline">:message</span>') }}
		</div>
	</div>

	<div class="control-group{{ ($errors->has('hip'))?' error':'' }}">
		{{ Form::label('hip', 'Hip', array('class'=>'control-label'))}}
		<div class="controls">
			<div class="input-append">
				{{ Form::text('hip', Input::old('hip'), array('class'=>'input-mini')) }}
				<span class="add-on">{{ Auth::user()->profile->units_height() }}</span>
			</div>
			{{ $errors->first('hip', '<span class="help-inline">:message</span>') }}
		</div>
	</div>

	<div class="control-group{{ ($errors->has('thigh'))?' error':'' }}">
		{{ Form::label('thigh', 'Thigh', array('class'=>'control-label'))}}
		<div class="controls">
			<div class="input-append">
				{{ Form::text('thigh', Input::old('thigh'), array('class'=>'input-mini')) }}
				<span class="add-on">{{ Auth::user()->profile->units_height() }}</span>
			</div>
			{{ $errors->first('thigh', '<span class="help-inline">:message</span>') }}
		</div>
	</div>

	<legend>Extras</legend>

	<div class="control-group{{ ($errors->has('photos'))?' error':'' }}">
		{{ Form::label('photos', 'Photos', array('class'=>'control-label'))}}
		<div class="controls">
			<div>
				{{ Form::textarea('photos', Input::old('photos'), array('class'=>'span4','placeholder'=>'http://example.com/pic1.jpg')) }}
				<span class="help-inline">Enter one photo url per line (url must end in .jpg)</span>
			</div>
			{{ $errors->first('photos', '<span class="help-inline">:message</span>') }}
		</div>
	</div>

	<div class="control-group">
		{{ Form::label('comments', 'Comments', array('class'=>'control-label'))}}
		<div class="controls">
			<div>
				{{ Form::textarea('comments', Input::old('comments'), array('class'=>'span4', 'placeholder'=>'Talk about anything you like here')) }}
				{{ $errors->first('comments', '<span class="help-inline">:message</span>') }}
			</div>
		</div>
	</div>

	<div class="form-actions">
		{{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
		{{ HTML::link('/entry/view/' . $entry_id, 'Cancel', array('class'=>'btn')) }}
	</div>

{{ Form::close() }}

@endsection