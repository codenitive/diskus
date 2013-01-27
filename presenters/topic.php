<?php namespace Diskus\Presenter;

use Diskus\Model\Topic as T,
	Orchestra\Form, 
	Orchestra\Table;

class Topic {
	
	/**
	 * View table generator for Diskus\Model\Topic
	 *
	 * @static
	 * @access public
	 * @param  Diskus\Model\Topic   $model
	 * @return Orchestra\Table
	 */
	public static function table($model)
	{
		return Table::of('diskus.topics', function ($table) use ($model)
		{
			$table->empty_message = __('orchestra::label.no-data');

			// Add HTML attributes option for the table.
			$table->attr('class', 'table table-bordered table-striped');

			// attach Model and set pagination option to true
			$table->with($model, true);

			// Add columns.
			$table->column(__('orchestra::label.name'), 'name');

			$table->column('fullname', function ($column)
			{
				$column->label(__('orchestra::label.users.fullname'));
				$column->value(function ($row)
				{
					return $row->user->fullname;
				});
			});
		});
	}

	/**
	 * View form generator for Diskus\Model\Topic
	 *
	 * @static
	 * @access public
	 * @param  Diskus\Model\Topic   $model
	 * @return Orchestra\Table
	 */
	public static function form($model)
	{
		return Form::of('diskus.topics', function ($form) use ($model)
		{
			$form->row($model);

			$form->attr(array(
				'action' => handles("orchestra::resources/diskus.topics/view/{$model->id}"),
				'method' => 'POST',
			));

			$form->hidden('id');

			$form->fieldset(function ($fieldset)
			{
				$fieldset->control('input:text', 'title');
				
				$fieldset->control('textarea', 'content', function ($control)
				{
					$control->label('Content');
					$control->attr(array(
						'class' => 'span12 !span4', 
						'role' => 'redactor',
					));
				});

				$fieldset->control('select', 'status', function ($control)
				{
					$control->options(array(
						T::STATUS_PUBLISH => 'Publish',
						T::STATUS_PRIVATE => 'Private',
						T::STATUS_DRAFT   => 'Draft',
					));
				});
			});
		});
	}
}