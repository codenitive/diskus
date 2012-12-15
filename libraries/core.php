<?php namespace Diskus;

use Orchestra\Core as O,
	Orchestra\Acl;

class Core {
	
	/**
	 * Start your engine
	 *
	 * @static
	 * @access public
	 * @return void
	 */
	public static function start()
	{
		Acl::make('diskus')->attach(O::memory());
	}
}