<?php

use Diskus\Model\Tag;

class Diskus_Create_Topic_Tags {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('diskus_topic_tags', function ($table)
		{
			$table->increments('id');
			$table->integer('topic_id')->unsigned();
			$table->integer('tag_id')->unsigned();

			$table->timestamps();

			$table->unique(array('topic_id', 'tag_id'));
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('diskus_topic_tags');
	}

}