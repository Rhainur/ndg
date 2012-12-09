<?php

class User_Task{

	public function run($args){
		var_dump($args);
	}

	public function generate($args){

		$user = new User;
		$user->username = 'admin';
		$user->password = Hash::make('admin'); // Purely for testing
		$user->email = 'admin@rohitnair.net';
		$user->role = 1;
		$user->activated = 1;
		$user->active = 1;
		$user->save();

	}

	public function profile($args){
		$prof = new User_Profile;
		$prof->user_id = 1;
		$prof->save();
	}
}

?>