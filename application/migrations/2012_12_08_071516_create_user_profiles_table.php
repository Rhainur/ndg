<?php

class Create_User_Profiles_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_profiles', function($table) {
			$table->increments('id');

			$table->integer('user_id')->unsigned();
			$table->date('date_of_birth')->nullable();
			$table->decimal('height', 5, 2)->nullable();
			$table->boolean('use_metric_units')->default(1);

			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_profiles');
	}

}