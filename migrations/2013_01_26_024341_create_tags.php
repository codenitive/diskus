<?php

use Diskus\Model\Tag;

class Diskus_Create_Tags {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('diskus_tags', function ($table)
		{
			$table->increments('id');
			
			$table->string('name');
			$table->string('slug');
			$table->string('status')->default(Tag::STATUS_PUBLISH);

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
		Schema::drop('diskus_tags');
	}

}