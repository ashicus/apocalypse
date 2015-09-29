<?php

class Create_Apocalypse_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table("apocalypses", function($table)
		{
			$table->create();

			$table->increments('id');
			$table->date('start_date');
			$table->date('end_date');
			$table->string('readable_date', 255);
			$table->string('claimant', 255);
			$table->text('description');

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
		Schema::table("apocalypses", function($table)
		{
			$table->drop();
		});
	}

}