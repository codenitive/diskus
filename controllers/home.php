<?php

use Orchestra\Site,
	Orchestra\View;

class Diskus_Home_Controller extends Controller {
	
	/**
	 * Use restful verb.
	 *
	 * @var boolean
	 */
	public $restful = true;

	/**
	 * Add filter on __construct
	 *
	 * @access public
	 * @return Response
	 */
	public function __construct()
	{
		parent::__construct();

		$this->filter('before', 'diskus::view-topic');
	}

	/**
	 * Get landing page.
	 *
	 * @access public
	 * @return Response
	 */
	public function get_index()
	{
		$topics = Diskus\Model\Topic::recent_active()->paginate(10);
		
		return View::make('diskus::home.index', compact('topics'));
	}
}