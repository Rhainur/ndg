<?php

class Create_Checkins {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('checkins', function($table){
			$table->increments('id');

			$table->integer('entry_id')->unsigned();

			$table->decimal('weight', 5, 2);
			$table->decimal('body_fat_percentage', 2, 2);

			$table->decimal('waist_measurement', 5, 2);
			$table->decimal('hip_measurement', 5, 2);
			$table->decimal('chest_measurement', 5, 2);
			$table->decimal('neck_measurement', 5, 2);
			$table->decimal('thigh_measurement', 5, 2);
			$table->decimal('arm_measurement', 5, 2);

			$table->text('comments');
			$table->boolean('latest');

			$table->timestamps();

			$table->foreign('entry_id')->references('id')->on('entries');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('checkins');
	}

}