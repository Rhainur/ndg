@layout('master')
<?php

function get_name($x){
	return $x->name;
}

?>
@section('content')
	<div class="row">
		<div class="span4 entry-weight-top-block">
			<h3>Starting Weight</h3>
			<div>
				{{ $entry->weight }} {{ Auth::user()->profile->units_weight() }}
			</div>
		</div>

		<div class="span4 entry-weight-top-block">
			@if( $latest_checkin != null )
			<h3>Last Checkin Weight</h3>
			<div>
				{{ $latest_checkin->weight }} {{ Auth::user()->profile->units_weight() }}
			</div>
			@endif
		</div>

		<div class="span4 entry-new-checkin-block">
			@if(!$checked_in)
			<a href="{{ URL::to('/entry/checkin/' . $entry->id ) }}" class="btn btn-large btn-primary">
				New Checkin
			</a>
			@endif;
		</div>
	</div>

	<div class="row">
		<div id="graph-container" class="span12 graph-container-large">

		</div>
		<div class="hidden weight-data">
			<?php
			$weight_data = array();
			$weight_data[] = array(substr($entry->created_at,0,10),$entry->weight);
			foreach($entry->checkins as $checkin){
				$weight_data[] = array(substr($checkin->created_at,0,10),$checkin->weight);
			}
			echo json_encode($weight_data);
			?>
		</div>
	</div>
@endsection