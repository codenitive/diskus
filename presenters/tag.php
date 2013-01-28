<?php namespace Diskus\Presenter;

use Diskus\Model\Tag as T,
	Orchestra\Form, 
	Orchestra\Table;

class Tag {
	
	/**
	 * View table generator for Diskus\Model\Tag
	 *
	 * @static
	 * @access public
	 * @param  Diskus\Model\Tag    $model
	 * @return Orchestra\Table
	 */
	public static function table($model)
	{
		return Table::of('diskus.tags', function ($table) use ($model)
		{
			$table->empty_message = __('orchestra::label.no-data');

			// Add HTML attributes option for the table.
			$table->attr('class', 'table table-bordered table-striped');

			// attach Model and set pagination option to true
			$table->with($model, true);

			// Add columns.
			$table->column(__('diskus::label.name'), 'name');
			$table->column(__('diskus::label.slug'), 'slug');
		});
	}

	/**
	 * View form generator for Diskus\Model\Topic
	 *
	 * @static
	 * @access public
	 * @param  Diskus\Model\Tag     $model
	 * @return Orchestra\Form
	 */
	public static function form($model)
	{
		return Form::of('diskus.tags', function ($form) use ($model)
		{
			$form->row($model);

			$form->attr(array(
				'action' => handles("orchestra::resources/diskus.tags/view/{$model->id}"),
				'method' => 'POST',
			));

			$form->hidden('id');

			$form->fieldset(function ($fieldset)
			{
				$fieldset->control('input:text', __('diskus::label.name'), 'name');
				$fieldset->control('input:text', 'slug', function($control)
				{
					$control->label(__('diskus::label.slug'));
					$control->attr(array('class' => 'span3'));
				});
			});
		});
	}
}