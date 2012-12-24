<?php

class Create_Entry_Choices_Pivots {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entry_goal', function($table){
			$table->increments('id');

			$table->integer('entry_id')->unsigned();
			$table->integer('goal_id')->unsigned();

			$table->foreign('entry_id')->references('id')->on('entries');
			$table->foreign('goal_id')->references('id')->on('goals');

			$table->timestamps();
		});

		Schema::create('diet_entry', function($table){
			$table->increments('id');

			$table->integer('entry_id')->unsigned();
			$table->integer('diet_id')->unsigned();

			$table->foreign('entry_id')->references('id')->on('entries');
			$table->foreign('diet_id')->references('id')->on('diets');

			$table->timestamps();
		});

		Schema::create('entry_exercise_type', function($table){
			$table->increments('id');

			$table->integer('entry_id')->unsigned();
			$table->integer('exercise_type_id')->unsigned();

			$table->foreign('entry_id')->references('id')->on('entries');
			$table->foreign('exercise_type_id')->references('id')->on('exercise_types');

			$table->timestamps();
		});

		Schema::create('entry_fitness_tracker', function($table){
			$table->increments('id');

			$table->integer('entry_id')->unsigned();
			$table->integer('fitness_tracker_id')->unsigned();

			$table->foreign('entry_id')->references('id')->on('entries');
			$table->foreign('fitness_tracker_id')->references('id')->on('fitness_trackers');

			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('entry_goal');
		Schema::drop('diet_entry');
		Schema::drop('entry_exercise_type');
		Schema::drop('entry_fitness_tracker');
	}

}