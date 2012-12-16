<?php namespace Diskus\Model;

use \Eloquent;

class Topic extends Eloquent {

	const STATUS_DRAFT   = 'draft'; 
	const STATUS_PRIVATE = 'private';
	const STATUS_DELETED = 'deleted';
	const STATUS_PUBLISH = 'publish';

	public static $table = 'diskus_topics';

	/**
	 * Get recent active topics
	 *
	 * @static
	 * @access public
	 * @return self
	 */
	public static function recent_active()
	{
		return static::where_in('status', array(static::STATUS_PUBLISH))
				->order_by('updated_at', 'DESC');
	}

	/**
	 * Belongs to relationship with `users` table.
	 *
	 * @access public
	 * @return Orchestra\Model\User
	 */
	public function users()
	{
		return $this->belongs_to(Config::get('auth.model'));
	}
}