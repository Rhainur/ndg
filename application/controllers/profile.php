<?php

class Profile_Controller extends Base_Controller {

	public function __construct(){
		$this->filter('before', 'auth');
	}

	public function action_index()
	{
		$roles = null;
		if( Auth::user()->role <= 2 ){ // Mod or Admin
			$roles = array();
			foreach(Role::all() as $r){
				$roles[$r->id] = $r->name;
			}
		}
		return View::make('profile')
		->with('user_profile', Auth::user()->profile)
		->with('roles', $roles)
		->with('months', array(
			'0' => ' ',
			'1' => 'January',
			'2' => 'February',
			'3' => 'March',
			'4' => 'April',
			'5' => 'May',
			'6' => 'June',
			'7' => 'July',
			'8' => 'August',
			'9' => 'September',
			'10' => 'October',
			'11' => 'November',
			'12' => 'December',
		));
	}

	public function action_update(){
		$input = Input::get();
		if( $input['dob_year'] || $input['dob_month'] || $input['dob_day'] )
			$input['dob'] = $input['dob_year'] . '-' . $input['dob_month'] . '-' .$input['dob_day'];
		else
			$input['dob'] = '';

		$rules = array(
			'height' => 'numeric',
			'use_metric_units' => 'integer|min:0|max:1',
			'sex' => 'integer|min:0|max:1',
			'dob' => 'valid_date',
			'current_password' => 'required_with:new_password|password_verification',
			'new_password' => 'different:current_password|confirmed'
		);

		$messages = array(
		    'valid_date' => 'The date you chose doesn\'t seem to be valid',
		    'password_verification' => 'The password you have entered is incorrect',
		);

		Validator::register('valid_date', function($attribute, $value, $parameters){
		    return ( (strtotime($value) != false) || (strlen($value) == 0) );
		});

		Validator::register('password_verification', function($attribute, $value, $parameters){
		    return ( Hash::check($value, Auth::user()->password) );
		});

		$validation = Validator::make($input, $rules, $messages);

		if( $validation->fails() ){
			return Redirect::to('/profile')->with_errors($validation);
		}

		Auth::user()->profile->update_profile($input);

		if(Input::has('new_password')){
			Auth::user()->change_password(Input::get('new_password'));
			Session::flash('message_password_update', 'Your password was successfully changed.');
		}

		return Redirect::to('/profile')
		->with('message_profile_update', 'Your profile was succesfully updated.');
	}

}