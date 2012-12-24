<?php

class Entry_Controller extends Base_Controller {

	public function __construct(){
		$this->filter('before', 'auth');
	}

	public function action_view($id){
		$e = Entry::with(array('goals','diets','exercise_types','fitness_trackers'))->find($id);

		if($e->user_id != Auth::user()->id){
			return Redirect::to('/');
		}
		var_dump($e);
	}

}