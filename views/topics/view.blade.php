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

			<div>
				{{ $topic->content }}
			</div>

			<ul class="inline-list meta">
				<li><span class="radius secondary label">{{ count($topic->comment) }} Comments</span></li>
				<li><span class="radius alert label">Not Answered</span></li>
			</ul>
			<hr>
		</article>

		<section class="comments">
			@forelse ($topic->comment as $comment)
				<article id="comment-{{ $comment->id }}" class="comment">
					<h6 title="comment-{{ $comment->id }}">{{ $comment->user->fullname }}</h6>
					<div class="content">
						{{ $comment->content }}
					</div>
					<hr>
				</article>
			@empty
				<h6>No comment at the moment.</h6>
				<hr>
			@endforelse

			@if (Orchestra\Acl::make('diskus')->can('create topic'))
			{{ Form::open(handles('diskus::comments/add'), 'POST') }}
				{{ Form::token() }}
				{{ Form::hidden('topic_id', $topic->id) }}
				<h5>Add Comment</h5>
				<div class="row">
					<div class="large-12 columns">
						{{ Form::textarea('content', '', array('role' => 'redactor')) }}
					</div>
				</div>
				<br>
				<div class="row">
					<div class="large-12 columns">
						{{ Form::submit('Add Comment', array('class' => 'small radius button')) }}
					</div>
				</div>
			{{ Form::close() }}
			@endif
		</section>
		
	</div>
	<div class="large-3 columns">
		@include(locate('diskus::layout.widgets.sidebars.user'))
		@placeholder('diskus.sidebar')
	</div>
</div>
@endsection