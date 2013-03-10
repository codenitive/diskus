<?php namespace Diskus\Model;

use \Config,
	\Eloquent;

class Comment extends Eloquent {

	/**
	 * Manually define the table.
	 *
	 * @var string
	 */
	public static $table = 'diskus_comments';

	/**
	 * define constant.
	 */
	const IS_ANSWER      = 1;
	const NOT_ANSWER     = 0;
	const STATUS_DELETED = 'deleted';
	const STATUS_PUBLISH = 'publish';

	/**
	 * Belongs to relationship with `diskus_topics` table.
	 *
	 * @access public
	 * @return Diskus\Model\Topic
	 */
	public function topic()
	{
		return $this->belongs_to('Diskus\Model\Topic', 'topic_id');
	}

	/**
	 * Belongs to relationship with `users` table.
	 *
	 * @access public
	 * @return Orchestra\Model\User
	 */
	public function user()
	{
		return $this->belongs_to(Config::get('auth.model'));
	}
}