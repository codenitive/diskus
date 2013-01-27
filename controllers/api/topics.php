<?php

use Diskus\Model\Topic,
	Diskus\Presenter\Topic as TopicPresenter,
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
		$table  = TopicPresenter::table($topics);
		$data   = array(
			'eloquent' => $topics,
			'table'    => $table,
		);

		View::share('_title_', __('diskus::title.topics.list'));

		return View::make('diskus::api.topics.index', $data);
	}

	/**
	 * Get add/edit a topic
	 *
	 * @access public
	 * @return Response
	 */
	public function get_view($id = null)
	{
		$type  = "update";
		$topic = Topic::find($id);

		if (is_null($topic))
		{
			$type  = "create";
			$topic = new Topic(array(
				'user_id' => Auth::user()->id,
			));
		}

		$form = TopicPresenter::form($topic);
		$data = array(
			'eloquent' => $topic,
			'form'     => $form,
		);

		View::share('_title_', __("diskus::title.topics.{$type}"));

		return View::make('diskus::api.topics.edit', $data);
	}

	/**
	 * Post add/edit a topic
	 *
	 * @access public
	 * @return Response
	 */
	public function post_view($id = null)
	{
		$input = Input::all();
		$rules = array(
			'title'   => array('required'),
			'content' => array('required'),
		);
	}
}