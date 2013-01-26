<?php namespace Diskus\Model;

use \Eloquent;

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
}