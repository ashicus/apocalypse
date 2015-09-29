<?php

class Add_Apocalypse_Date_Indexes {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table("apocalypses", function($table)
		{
			$table->index("start_date");
			$table->index("end_date");
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
			$table->drop_index("start_date");
			$table->drop_index("end_date");
		});
	}

}