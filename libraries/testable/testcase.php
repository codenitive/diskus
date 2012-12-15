<?php namespace Diskus\Testable;

use Orchestra\Testable\TestCase as T;

class TestCase extends T {
	
	/**
	 * Create application
	 *
	 * @access public
	 * @return void
	 */
	public function createApplication()
	{
		$this->app = new Application;
	}
}