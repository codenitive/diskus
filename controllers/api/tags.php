<?php

use Diskus\Model\Tag,
	Diskus\Presenter\Tag as TagPresenter,
	Orchestra\Messages,
	Orchestra\Site,
	Orchestra\View;

class Diskus_Api_Tags_Controller extends Controller {

	/**
	 * Use restful verb.
	 *
	 * @var boolean
	 */
	public $restful = true;

	/**
	 * Get a list of tags.
	 *
	 * @access public
	 * @return Response
	 */
	public function get_index()
	{
		$tags  = Tag::paginate(30);
		$table = TagPresenter::table($tags);
		$data  = array(
			'eloquent' => $tags,
			'table'    => $table,
		);

		Site::set('title', __('diskus::title.tags.list'));
		
		return View::make('diskus::api.tags.index', $data);
	}

	/**
	 * Get add/edit a tag.
	 *
	 * @access public
	 * @return Response
	 */
	public function get_view($id = null)
	{
		$type = "update";
		$tag  = Diskus\Model\Tag::find($id);

		if (is_null($tag))
		{
			$type = "create"; 
			$tag  = new Diskus\Model\Tag;
		}

		$form = TagPresenter::form($tag);
		$data  = array(
			'eloquent' => $tag,
			'form'     => $form,
		);

		Site::set('title', __("diskus::title.tags.{$type}"));

		return View::make('diskus::api.tags.edit', $data);
	}

	/**
	 * Post new/edit tag.
	 *
	 * @access public
	 * @return Response
	 */
	public function post_view($id = null)
	{
		$type  = "update";
		$id    = $id ?: '0';
		$input = Input::only(array('name', 'slug'));
		$rules = array(
			'name' => array('required'),
			'slug' => array('required', "unique:diskus_tags,slug,{$id}"),
		);

		$msg = Messages::make();
		$val = Validator::make($input, $rules);

		if ($val->fails())
		{
			return Redirect::to(handles("orchestra::resources/diskus.tags/view/{$id}"))
					->with_input()
					->with_errors($val);
		}

		$tag = Diskus\Model\Tag::find($id);

		if (is_null($tag))
		{
			$type = "create";
			$tag  = new Diskus\Model\Tag;
		}

		$tag->name = $input['name'];
		$tag->slug = $input['slug'];

		try 
		{
			DB::transaction(function () use ($tag)
			{
				$tag->save();
			});

			$msg->add('success', __("diskus::response.tags.{$type}"));
		}
		catch (Exception $e)
		{
			$msg->add('error', __('orchestra::response.db-failed'));
		}

		return Redirect::to(handles('orchestra::resources/diskus.tags'))
				->with('message', $msg->serialize());
	}

}