<?php namespace Diskus\Model;

use \Eloquent;

class Comment extends Eloquent {

	/**
	 * Manually define the table.
	 *
	 * @var string
	 */
	public static $table = 'diskus_comments';
}