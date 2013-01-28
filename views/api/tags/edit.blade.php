@include(locate('diskus::api.widgets.menu'))

<div class="page-header">
	
	<h2>{{ isset($_title_) ? $_title_ : 'Diskus' }}
		@if ( ! empty($_description_))
		<small>{{ $_description_ ?: '' }}</small>
		@endif
	</h2>

</div>

{{ $form }}