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

	public function action_form_signup(){
		$rules = array(
			'weight' => 'required|numeric',
		);

		$validation = Validator::make(Input::all(), $rules);

		if( $validation->fails() ){
			return Redirect::to('/challenge/signup/' . Input::get('challenge_id'))->with_errors($validation)->with_input();
		}else{
			if( Challenge::signup(Input::all()) ){
				return Redirect::to('/');
			}else{
				return Redirect::to('/')->with('error_message', 'Signup failed');
			}
		}
	}

}