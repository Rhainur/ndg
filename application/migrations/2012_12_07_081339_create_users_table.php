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

			$table->integer('role')->unsigned();

			$table->boolean('activated')->default(0);
			$table->boolean('active')->default(0);

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