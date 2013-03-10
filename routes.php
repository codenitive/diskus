<?php

/*
|--------------------------------------------------------------------------
| Diskus Routes
|--------------------------------------------------------------------------
|
| Define basic routing for Diskus.
|
*/

Route::any('(:bundle)', function ()
{
	return Controller::call('diskus::home@index');
});

Route::controller(array(
	'diskus::topics',
));

Route::filter('diskus::create-topic', function()
{
	if ( ! Orchestra\Acl::make('diskus')->can('create topic'))
	{
		return Redirect::to(handles('diskus'));
	}
});