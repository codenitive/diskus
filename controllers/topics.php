<?php

use Diskus\Model\Topic,
	Orchestra\Site,
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
		$this->filter('before', 'diskus::view-topic')->only('view');
		$this->filter('before', 'orchestra::csrf')->only('add')->on('post');
	}

	/**
	 * View a topic
	 *
	 * @access public
	 * @return Response
	 */
	public function get_view($id, $slug = null)
	{
		$topic = Topic::with('comment')->find($id);

		if (is_null($topic)) return Response::error('404');

		return View::make('diskus::topics.view', compact('topic'));
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
		$input = Input::only(array('title', 'content'));
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

		$topic = new Topic(array(
			'user_id' => Auth::user()->id,
			'answer'  => Topic::NOT_ANSWERED,
			'status'  => Topic::STATUS_PUBLISH,
		));
		$topic->fill($input);

		$topic->save();

		return Redirect::to(handles('diskus::home'));
	}
}