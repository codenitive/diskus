@layout(locate('diskus::layout.main'))

@section('content')
<br>
<div class="row">
	<div class="large-9 columns">
		
	</div>
	<div class="small-3 columns">
		@include(locate('diskus::layout.widgets.sidebars.user'))
		@placeholder('diskus.sidebar')
	</div>
</div>
@endsection