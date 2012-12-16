<?php

use Orchestra\View;

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
		View::share('_title_', 'Diskus');
		
		return View::make('diskus::api.home');
	}
}