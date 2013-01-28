@include(locate('diskus::api.widgets.menu'))

<div class="page-header">
	
	<div class="pull-right">
		<a href="{{ URL::current() }}/view" class="btn btn-primary">
			{{ __('diskus::title.topics.create') }}
		</a>
	</div>
	
	<h2>{{ isset($_title_) ? $_title_ : 'Diskus' }}
		@if ( ! empty($_description_))
		<small>{{ $_description_ ?: '' }}</small>
		@endif
	</h2>

</div>

{{ $table }}