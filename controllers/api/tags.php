<?php

use Orchestra\View;

class Diskus_Api_Tags_Controller extends Controller {

	/**
	 * Use restful verb.
	 *
	 * @var boolean
	 */
	public $restful = true;

	public function get_index()
	{
		$data = array('table' => '');

		View::share('_title_', __('diskus::title.tags.list'));
		
		return View::make('diskus::api.tags.index', $data);
	}
}