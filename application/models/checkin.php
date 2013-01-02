<?php

class Checkin extends Eloquent{
	public function entry(){
		return $this->belongs_to('Entry');
	}

	public static function latest($checkins){
		if(count($checkins)==0)
			return null;

		foreach($checkins as $c){
			if($c->latest == 1)
				return $c;
		}

		return null;
	}
}

?>