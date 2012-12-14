<?php

class Create_tracker_choices_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fitness_trackers', function($table) {
			$table->increments('id');

			$table->string('name', 128);

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
		Schema::drop('fitness_trackers');
	}

}