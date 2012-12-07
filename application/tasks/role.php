<?php

class Role_Task{

	public function run($args){
		var_dump($args);
	}

	public function generate($args){
		$role = new Role;
		$role->name = 'Admin';
		$role->save();

		$role = new Role;
		$role->name = 'Moderator';
		$role->save();

		$role = new Role;
		$role->name = 'User';
		$role->save();
	}
}

?>