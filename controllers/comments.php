<?php

use Diskus\Model\Topic,
	Diskus\Model\Comment,
	Orchestra\View;

class Diskus_Comments_Controller extends Controller {
	
	/**
	 * Use restful verb.
	 *
	 * @var boolen
	 */
	public $restful = true;

	public function __construct()
	{
		parent::__construct();

		$this->filter('before', 'orchestra::csrf');
		$this->filter('before', 'diskus::create-topic');
	}

	public function post_add()
	{
		$input = Input::only(array('topic_id', 'content'));
		$rules = array(
			'topic_id' => array('required'),
			'content'  => array('required'),
		);

		$topic = Topic::find($input['topic_id']);

		if (is_null($topic)) return Response::error('500');

		$slug = Str::slug($topic->title);
		$val  = Validator::make($input, $rules);

		if ($val->fails())
		{
			return Redirect::to(handles("diskus::topic/{$topic->id}/{$slug}"))
					->with_input()
					->with_errors($val);
		}

		$comment = new Comment(array(
			'user_id'  => Auth::user()->id,
			'answer'   => Comment::NOT_ANSWER,
			'status'   => Comment::STATUS_PUBLISH,
		));
		
		$comment->fill($input);
		$comment->save();

		return Redirect::to(handles("diskus::topic/{$topic->id}/{$slug}"));
	}
}