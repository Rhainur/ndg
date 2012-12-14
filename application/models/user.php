<?php

class User extends Eloquent{

	public function profile(){
		return $this->has_one('User_Profile');
	}

	public function change_password($new_password){
		$this->password = Hash::make($new_password);
		$this->save();
	}
}

?>