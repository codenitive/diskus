@layout(locate('diskus::layout.main'))

<?php $error_message = '<small class="error">:message</small>'; ?>

@section('content')
<br>
<div class="row">
	<div class="large-9 columns">
		<h3>Add Topic</h3>

		{{ Form::open(handles('diskus::topics/add'), 'POST') }}
			{{ Form::token() }}
			<div class="row">
				<div class="large-12 columns {{ $errors->has('title') ? 'error' : '' }}">
					{{ Form::label('title', 'Title') }}
					{{ Form::text('title', Input::old('title')) }}
					{{ $errors->first('title', $error_message) }}
				</div>
			</div>

			<div class="row">
				<div class="large-12 columns {{ $errors->has('content') ? 'error' : '' }}">
					{{ Form::label('content', 'Content') }}
					{{ Form::textarea('content', Input::old('title'), array('role' => 'redactor')) }}
				</div>
			</div>
			<br>
			<div class="row">
				{{ Form::submit('Submit', array('class' => 'small radius button')) }}
			</div>
		{{ Form::close() }}
	</div>
	<div class="large-3 columns">
		@include(locate('diskus::layout.widgets.sidebars.user'))
		@placeholder('diskus.sidebar')
	</div>
</div>
@endsection