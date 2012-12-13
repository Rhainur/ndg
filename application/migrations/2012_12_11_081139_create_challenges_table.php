<?php

class Create_Challenges_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('challenges', function($table) {
			$table->increments('id');

			$table->string('name', 32);
			$table->date('start_date');
			$table->date('end_date');

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
		Schema::drop('challenges');
	}

}