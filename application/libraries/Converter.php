<?php

class Converter{

	public static function height( $value, $in_units, $out_units ){
		// $in_units/$out_units: 0 = imperial, 1 = metric

		if( $in_units == $out_units )
			return $value;

		if( $out_units ) // Convert from inches to cm
			return round($value/0.3937,2);
		else // Convert from cm to inches
			return round($value*0.3937,2);
	}

	public static function weight( $value, $in_units, $out_units ){
		// $in_units/$out_units: 0 = imperial, 1 = metric

		if( $in_units == $out_units )
			return $value;

		if( $out_units ) // Convert from lb to kg
			return round($value/2.20462,2);
		else // Convert from kg to lb
			return round($value*2.20462,2);
	}
}

?>