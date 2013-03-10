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
		$this->filter('before', 'orchestra::csrf')->only('add')->on('post');
	}

	/**
	 * GET Add Topic page
	 *
	 * @access public
	 * @return Response
	 */
	public function get_add()
	{
		return View::make('diskus::topics.add');
	}

	/**
	 * POST Add topic
	 *
	 * @access public
	 * @return Response
	 */
	public function post_add()
	{
		$input = Input::all();
		$rules = array(
			'title'   => array('required'),
			'content' => array('required'),
		);

		$val = Validator::make($input, $rules);

		if ($val->fails())
		{
			return Redirect::to(handles('diskus::topics/add'))
					->with_input()
					->with_errors($val);
		}
	}
}