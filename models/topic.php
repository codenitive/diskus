<?php namespace Diskus\Model;

use \Config,
	\Eloquent;

class Topic extends Eloquent {

	/**
	 * Manually define the table.
	 *
	 * @var string
	 */
	public static $table = 'diskus_topics';

	/**
	 * define constant.
	 */
	const ANSWERED       = 1;
	const NOT_ANSWERED   = 0;
	const STATUS_DRAFT   = 'draft'; 
	const STATUS_PRIVATE = 'private';
	const STATUS_DELETED = 'deleted';
	const STATUS_PUBLISH = 'publish';

	/**
	 * Get recent active topics
	 *
	 * @static
	 * @access public
	 * @return self
	 */
	public static function recent_active()
	{
		return static::with(array('user'))
				->where_in('status', array(static::STATUS_PUBLISH))
				->order_by('updated_at', 'DESC');
	}

	/**
	 * Get recent not answered topics
	 *
	 * @static
	 * @access public
	 * @return self
	 */
	public static function recent_not_answered()
	{
		return static::recent_active()
				->where_answer(static::NOT_ANSWERED);
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