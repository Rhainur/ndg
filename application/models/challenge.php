<?php
class Challenge extends Eloquent{

	public static function get_active_challenges(){
		$today = date('Y-m-d');
		return Challenge::where('start_date', '<=', $today)->where('end_date', '>=', $today)->get();
	}
}
?>