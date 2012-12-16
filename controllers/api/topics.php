<?php

use Diskus\Model\Topic,
	Orchestra\View;

class Diskus_Api_Topics_Controller extends Controller {
	
	/**
	 * Use restful verb.
	 *
	 * @var boolean
	 */
	public $restful = true;

	/**
	 * Get lists of topics.
	 *
	 * @access public
	 * @return Response
	 */
	public function get_index()
	{
		$topics = Topic::recent_active()->paginate(30);

		return View::make('diskus::api.topics.index', compact('topics'));
	}
}