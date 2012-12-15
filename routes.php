<?php

Route::any('(:bundle)', function ()
{
	return Controller::call('diskus::home@index');
});