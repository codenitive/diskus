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
	 * Get landing page.
	 *
	 * @access public
	 * @return Response
	 */
	public function get_index()
	{
		$topics = Diskus\Model\Topic::recent_active()->paginate(30);
		
		return View::make('diskus::home.index', compact('topics'));
	}
}