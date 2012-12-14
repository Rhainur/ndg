<?php

class Create_Tracker_Choices_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tracker_choices', function($table) {
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
		Schema::drop('tracker_choices');
	}

}