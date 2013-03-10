<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	
	{{ HTML::title() }}

	<?php

	$asset = Asset::container('diskus.frontend');

	$asset->style('foundation', 'bundles/orchestra/vendor/foundation/css/foundation.min.css');
	$asset->script('foundation', 'bundles/orchestra/vendor/foundation/js/foundation.min.js');

	$asset->script('jquery', 'bundles/orchestra/js/jquery.min.js');
	$asset->script('redactor', 'bundles/orchestra/vendor/redactor/redactor.min.js', array('jquery'));
	$asset->script('diskus', 'bundles/diskus/js/diskus.min.js', array('redactor'));
	$asset->style('redactor', 'bundles/orchestra/vendor/redactor/css/redactor.css'); ?>

	{{ $asset->styles() }}
	{{ $asset->scripts() }}

</head>
<body>
	<div class="row">
		<div class="large-12 columns">
			<h2>{{ memorize('site.name') }}<h2>
			<p>{{ memorize('site.description') }}</p>
			<hr />
		</div>
	</div>

	@yield('content')

</body>
</html>