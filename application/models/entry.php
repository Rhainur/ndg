<?php

class Entry extends Eloquent{

	public function challenge()
    {
          return $this->belongs_to('Challenge');
    }

     public function user()
     {
          return $this->belongs_to('User');
     }

	public function goals()
    {
          return $this->has_many_and_belongs_to('Goal');
    }

    public function diets()
    {
          return $this->has_many_and_belongs_to('Diet');
    }

    public function exercise_types()
    {
          return $this->has_many_and_belongs_to('Exercise_Type');
    }

    public function fitness_trackers()
    {
          return $this->has_many_and_belongs_to('Fitness_Tracker');
    }

    public function checkins()
    {
          return $this->has_many('Checkin');
    }

    public static function checkin($input){
      $e = Entry::with('challenge')->find($input['entry_id']);

      if( $e == null || !$e->challenge->is_active() ){
        return false;
      }

      Checkin::where('entry_id', '=', $e->id)->update(array('latest' => 0));

      $c = new Checkin;
      $c->entry_id = $e->id;
      $c->weight = $input['weight'];
      $c->body_fat_percentage = $input['body_fat_percentage'];

      $c->neck_measurement = $input['neck'];
      $c->chest_measurement = $input['chest'];
      $c->arm_measurement = $input['arm'];
      $c->waist_measurement = $input['waist'];
      $c->hip_measurement = $input['hip'];
      $c->thigh_measurement = $input['thigh'];

      $c->comments = $input['comments'];
      $c->latest = 1;
      $c->save();

      $p_urls = preg_split("/\n/", $input['photos']);
      $p = array();
      foreach($p_urls as $url){
        $p[] = array('checkin_id'=>$c->id,'url'=>$url);
      }

      Photo::insert($p);
      return true;
    }
}

?>