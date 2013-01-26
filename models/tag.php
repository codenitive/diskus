<?php namespace Diskus\Model;

use \Eloquent;

class Tag extends Eloquent {

	/**
	 * Manually define the table.
	 *
	 * @var string
	 */
	public static $table = 'diskus_tags';

	/**
	 * define constant.
	 */
	const STATUS_DELETED = 'deleted';
	const STATUS_PUBLISH = 'publish';
}