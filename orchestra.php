<?php

Event::listen('orchestra.started: backend', function ()
{
	$diskus = Orchestra\Resources::make('diskus', array(
		'name' => 'Diskus',
		'uses' => 'diskus::api.home',
	));

	$diskus->topics = 'diskus::api.topics';
	$diskus->tags   = 'diskus::api.tags';
});