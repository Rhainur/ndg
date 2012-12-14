<?php

class Create_Entries_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entries', function($table){
			$table->increments('id');

			$table->integer('user_id')->unsigned();
			$table->integer('challenge_id')->unsigned();
			$table->decimal('weight', 5, 2);
			$table->integer('email_reminder_gap');
			$table->date('last_reminder_sent');

			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('challenge_id')->references('id')->on('challenges');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('entries');
	}

}