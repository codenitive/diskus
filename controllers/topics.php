<?php

use Orchestra\Site,
	Orchestra\View;

class Diskus_Topics_Controller extends Controller {

	/**
	 * Use restful verb.
	 *
	 * @var boolean
	 */
	public $restful = true;

	/**
	 * Add filters during __construct()
	 *
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		$this->filter('before', 'diskus::create-topic')->only('add');
	}

	public function get_add()
	{
		return View::make('diskus::topics.add');
	}
}