<?php

use Diskus\Model\Comment;

class Diskus_Create_Comments {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('diskus_comments', function ($table)
		{
			$table->increments('id');
			
			$table->integer('topic_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->text('content')->nullable();
			$table->text('metadata')->nullable();
			$table->boolean('answer')->default(Comment::IS_ANSWER);
			$table->string('status')->default(Comment::STATUS_PUBLISH);

			$table->timestamps();

			$table->index('topic_id');
			$table->index('user_id');
			$table->index('answer');
			$table->index('status');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('diskus_comments');
	}

}