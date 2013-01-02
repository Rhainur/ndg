<?php

class Create_Photos {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photos', function($table){
			$table->increments('id');

			$table->integer('checkin_id')->unsigned();

			$table->string('url', 255);

			$table->timestamps();

			$table->foreign('checkin_id')->references('id')->on('checkins');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('photos');
	}

}