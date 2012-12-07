<?php

class Create_Users_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {

			$table->increments('id');

			$table->string('username', 32);
			$table->string('email', 255);
			$table->string('password', 255);

			$table->integer('role');

			$table->boolean('activated');
			$table->boolean('active');

			$table->timestamps();

			$table->foreign('role')->references('id')->on('roles');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}