<?php

use Orchestra\Site, 
	Orchestra\View;

class Diskus_Api_Home_Controller extends Controller {
	
	/**
	 * Use restful verb.
	 *
	 * @var boolean
	 */
	public $restful = true;

	/**
	 * GET resources landing page.
	 *
	 * @access public
	 * @return Response
	 */
	public function get_index()
	{
		Site::set('title', 'Diskus');
		
		return View::make('diskus::api.home');
	}
}