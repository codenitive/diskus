<?php

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
		return View::make('diskus::home.index');
	}
}