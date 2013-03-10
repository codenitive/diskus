@include(locate('diskus::api.widgets.menu'))
<?php Orchestra\Site::set('header::add-button', true); ?>
@include(locate('orchestra::layout.widgets.header'))
{{ $table }}