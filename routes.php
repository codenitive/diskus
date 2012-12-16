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