<?php

class Admin_Controller extends Base_Controller {

	public function __construct(){
		$this->filter('before', 'auth');
		$this->filter('before', 'admin');
	}

	public function action_index()
	{
		return View::make('admin.home')->with('page_title', 'Admin Panel');
	}

	public function action_challenge(){
		return View::make('admin.challenge')
		->with('page_title', 'Admin Panel - Challenges')
		->with('active_challenges', Challenge::get_active_challenges());
	}

}