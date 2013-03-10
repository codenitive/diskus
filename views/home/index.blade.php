@layout(locate('diskus::layout.main'))

@section('content')
<br>
<div class="row">
	<div class="large-9 columns">
		@forelse ($topics->results as $topic)
			<?php $slug = Str::slug($topic->title); ?>
			<article class="topic">
				<h4>
					<a href="{{ handles("diskus::topic/{$topic->id}/{$slug}") }}">
						{{ $topic->title }}
					</a>
					<small>
						Created by {{ $topic->user->fullname }} 
						on {{ with(new DateTime($topic->created_at))->format('H:ma d M, Y') }}
					</small>
				</h4>
			</article>
			<hr>
		@empty
			<article>
				<h3>No topics at this moment</h3>
				<p>
					Maybe you can start <a href="{{ handles('diskus::topics/add') }}">one</a> today.
				</p>
			</article>
		@endforelse
	</div>
	<div class="small-3 columns">
		@include(locate('diskus::layout.widgets.sidebars.user'))
		@placeholder('diskus.sidebar')
	</div>
</div>
@endsection