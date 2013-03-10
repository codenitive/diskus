<?php

/*
|--------------------------------------------------------------------------
| Diskus Routes
|--------------------------------------------------------------------------
|
| Define basic routing for Diskus.
|
*/

Route::any('(:bundle)', array(
	'before' => 'diskus::view-topic', 
	function ()
	{
		return Controller::call('diskus::home@index');
	}));

Route::any('(:bundle)/topic/(:num)/(:any)', array(
	'before' => 'diskus::view-topic', 
	function ($num, $slug)
	{
		return Controller::call('diskus::topics@view', func_get_args());
	}));

Route::controller(array(
	'diskus::home',
	'diskus::topics',
));

Route::filter('diskus::view-topic', function()
{
	if ( ! Orchestra\Acl::make('diskus')->can('view topic'))
	{
		return Redirect::to('/');
	}
});

Route::filter('diskus::create-topic', function()
{
	if ( ! Orchestra\Acl::make('diskus')->can('create topic'))
	{
		return Redirect::to(handles('diskus'));
	}
});