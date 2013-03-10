@layout(locate('diskus::layout.main'))

@section('content')
<br>
<div class="row">
	<div class="large-9 columns">
		<section class="topics">
		@forelse ($topics->results as $topic)
			<?php $slug = Str::slug($topic->title); ?>
			<article class="topic">
				<h4>
					<a href="{{ handles("diskus::topic/{$topic->id}/{$slug}") }}">
						{{ $topic->title }}
					</a>
					<small class="meta">
						Created by {{ $topic->user->fullname }} 
						on {{ with(new DateTime($topic->created_at))->format('H:ma d M, Y') }}
					</small>
				</h4>
				<ul class="inline-list meta">
					<li><span class="radius secondary label">{{ count($topic->comment) }} Comments</span></li>
					<li><span class="radius alert label">Not Answered</span></li>
				</ul>
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
		</section>
	</div>
	<div class="small-3 columns">
		@include(locate('diskus::layout.widgets.sidebars.user'))
		@placeholder('diskus.sidebar')
	</div>
</div>
@endsection