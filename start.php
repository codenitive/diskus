<?php

/*
|--------------------------------------------------------------------------
| Diskus Library
|--------------------------------------------------------------------------
|
| Map Diskus Library using PSR-0 standard namespace.
|
*/

Autoloader::namespaces(array(
	'Diskus\Model'     => Bundle::path('diskus').'models'.DS, 
	'Diskus\Presenter' => Bundle::path('diskus').'presenters'.DS,
	'Diskus'           => Bundle::path('diskus').'libraries'.DS,
));

/*
|--------------------------------------------------------------------------
| Start Your Engine
|--------------------------------------------------------------------------
*/

Diskus\Core::start();