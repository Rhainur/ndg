<?php

class Entry_Controller extends Base_Controller {

	public function __construct(){
		$this->filter('before', 'auth');
	}

	public function action_view($id){
		$e = Entry::with(array('goals','diets','exercise_types','fitness_trackers','checkins'))->find($id);

		if($e->user_id != Auth::user()->id){
			return Redirect::to('/');
		}

		$latest = Checkin::latest($e->checkins);
		$checked_in = false;
		if( stristr( $latest->created_at, date('Y-m-d') ) != false )
			$checked_in = true;

		return View::make('entry.view')
			->with('entry', $e)
			->with('checked_in', $checked_in)
			->with('latest_checkin', $latest);
	}

	public function action_checkin($id){


		return View::make('entry.checkin')
			->with('entry_id', $id);
	}

	public function action_form_checkin(){

		$rules = array(
			'weight' => 'required|numeric',
			'body_fat_percentage' => 'numeric',
			'neck' => 'numeric',
			'chest' => 'numeric',
			'waist' => 'numeric',
			'hip' => 'numeric',
			'arm' => 'numeric',
			'thigh' => 'numeric',
			'photos' => 'check_photo_urls'
		);

		Validator::register('check_photo_urls', function($attribute, $value, $parameters){
			$urls = preg_split("/\n/", $value);
			foreach($urls as $url){
				if( !( filter_var($url, FILTER_VALIDATE_URL) && substr($url, -4) == '.jpg' ) )
					return false;
			}
			return true;
		});

		$messages = array(
			'check_photo_urls' => 'Each line must contain a valid url ending in .jpg'
		);

		$validation = Validator::make(Input::all(), $rules, $messages);

		if( $validation->fails() ){
			return Redirect::to('/entry/checkin/' . Input::get('entry_id'))->with_errors($validation)->with_input();
		}else{
			if(Entry::checkin(Input::all()))
				return Redirect::to('/entry/view/' . Input::get('entry_id'));
			else
				return Redirect::to('/entry/view/' . Input::get('entry_id'))->with('error_message', 'Checkin failed');


			/*if( Challenge::signup(Input::all()) ){
				return Redirect::to('/');
			}else{
				return Redirect::to('/')->with('error_message', 'Signup failed');
			}*/
		}
	}

}