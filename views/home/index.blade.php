@layout(locate('diskus::layout.main'))

@section('content')
<br>
<div class="row">
	<div class="large-9 columns">
		@forelse ($topics->results as $topic)

		@empty
			<h3>No topics at this moment</h3>
			<p>
				Maybe you can start <a href="{{ handles('diskus::topics/add') }}">one</a> today.
			</p>
		@endforelse
	</div>
	<div class="small-3 columns">
		@include(locate('diskus::layout.widgets.sidebars.user'))
		@placeholder('diskus.sidebar')
	</div>
</div>
@endsection