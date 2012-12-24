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
}

?>