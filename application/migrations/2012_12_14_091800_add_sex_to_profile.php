<?php

class Add_Sex_To_Profile {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_profiles', function($table){
			$table->boolean('sex')->default('0');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_profiles', function($table){
			$table->drop_column('sex');
		});
	}

}