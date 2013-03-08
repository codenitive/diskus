@section('diskus::primary_menu')
<ul class="nav">
		<li class="{{ URI::is('*/resources/diskus.topics*') ? 'active' : '' }}">
		{{ HTML::link(handles('orchestra::resources/diskus.topics'), 'Topics') }}
	</li>
	<li class="{{ URI::is('*/resources/diskus.tags*') ? 'active' : '' }}">
		{{ HTML::link(handles('orchestra::resources/diskus.tags'), 'Tags') }}
	</li>
</ul>
@endsection

@section('diskus::secondary_menu')
<ul class="nav pull-right">
	<li>
		<a href="{{ handles('diskus') }}" target="_blank"><i class="icon-home"></i> Website</a>
	</li>
</ul>
@endsection

<?php

$navbar = new Orchestra\Fluent(array(
	'id'             => 'diskus',
	'title'          => 'Diskus',
	'url'            => handles('orchestra::resources/diskus'),
	'primary_menu'   => Laravel\Section::yield('diskus::primary_menu'),
	'secondary_menu' => Laravel\Section::yield('diskus::secondary_menu'),
)); ?>

{{ Orchestra\Decorator::navbar($navbar) }}