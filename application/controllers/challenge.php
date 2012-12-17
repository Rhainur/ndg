<?php

class Challenge_Controller extends Base_Controller {

	public function __construct(){
		$this->filter('before', 'auth');
	}

	public function action_index(){
		return;
	}

	public function action_signup( $challenge_id ){
		if($challenge = Challenge::find($challenge_id)){
			return View::make('challenge.signup')
			->with('challenge', $challenge)
			->with('goals', Goal::all())
			->with('diets', Diet::all())
			->with('exercise_types', Exercise_Type::all())
			->with('fitness_trackers', Fitness_Tracker::all());
		}else{
			return Redirect::to('/');
		}
	}

}