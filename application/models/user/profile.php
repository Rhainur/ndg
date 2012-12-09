<?php

class User_Profile extends Eloquent{

	public function user(){
    	return $this->belongs_to('User');
    }

    public function dob_day(){
    	return (int)substr($this->date_of_birth,8,2);
	}

	public function dob_month(){
		return (int)substr($this->date_of_birth,5,2);
	}

	public function dob_year(){
		return (int)substr($this->date_of_birth,0,4);
	}

	public function update_profile($new){
		$this->use_metric_units = $new['use_metric_units'];
		$this->height = Converter::height($new['height'], $this->use_metric_units, 1);
		$this->date_of_birth = $new['dob'];
		$this->save();
	}

}

?>