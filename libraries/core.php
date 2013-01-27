<?php namespace Diskus;

use \Asset,
	\Event,
	Orchestra\Acl,
	Orchestra\Core as O;

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

		// Append all Diskus required assets for Orchestra Administrator 
		// Interface usage mainly on Resources page.
		Event::listen('orchestra.started: backend', function()
		{
			$asset = Asset::container('orchestra.backend');

			$asset->script('redactor', 'bundles/orchestra/vendor/redactor/redactor.js', array('jquery', 'bootstrap'));
			$asset->script('diskus', 'bundles/diskus/js/diskus.min.js', array('redactor'));
			$asset->style('redactor', 'bundles/orchestra/vendor/redactor/css/redactor.css', array('bootstrap'));
		});
	}
}