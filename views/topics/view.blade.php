@layout(locate('diskus::layout.main'))

@section('content')
<br>
<div class="row">
	<div class="large-9 columns">
		<article class="topic">
			<h4>
				{{ $topic->title }}
				<small>
					Created by {{ $topic->user->fullname }} 
					on {{ with(new DateTime($topic->created_at))->format('H:ma d M, Y') }}
				</small>
			</h4>
			<hr>

			<div>
				{{ $topic->content }}
			</div>
		</article>
		
	</div>
	<div class="small-3 columns">
		@include(locate('diskus::layout.widgets.sidebars.user'))
		@placeholder('diskus.sidebar')
	</div>
</div>
@endsection