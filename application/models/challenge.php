<?php
class Challenge extends Eloquent{

	public static function get_active_challenges(){
		$today = date('Y-m-d');
		return Challenge::where('start_date', '<=', $today)
		->where('end_date', '>=', $today)->get();
	}

	public static function get_user_challenges(){
		$today = date('Y-m-d');
		return Entry::where('user_id', '=', Auth::user()->id);
	}

	public static function signup($input){
		$c = Challenge::find($input['challenge_id']);

		if($c == null || !$c->is_active()){
			return false;
		}

		$e = Entry::where('challenge_id', '=', $input['challenge_id'])->where('user_id','=',Auth::user()->id)->first();

		if($e != null){
			return false;
		}

		var_dump(DB::profile());

		$e = new Entry;

		$e->challenge_id = $input['challenge_id'];
		$e->user_id = Auth::user()->id;
		$e->weight = Converter::weight($input['weight'], Auth::user()->profile->use_metric_units, 1);
		$e->email_reminder_gap = $input['email_reminder'];
		$e->last_reminder_sent = date('Y-m-d');

		$e->save();

		$e->goals()->sync(array_keys($input['goals']));
		$e->diets()->sync(array_keys($input['diets']));
		$e->exercise_types()->sync(array_keys($input['exercise_types']));
		$e->fitness_trackers()->sync(array_keys($input['fitness_trackers']));

		return true;
	}

	/* End of static functions */

	/*
		Returns true if today is within the challenge's time range
	*/

	public function is_active(){
		$now = time();
		return( strtotime($this->start_date) <= $now && strtotime($this->end_date) > $now );
	}


	/*
		Returns true if the challenge is in a list of entries, false otherwise
		Perhaps a better name?
	*/
	public function is_in($entries){
		foreach($entries as $entry){
			if($entry->challenge_id == $this->id)
				return true;
		}
		return false;
	}
}
?>