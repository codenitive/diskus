@if (Auth::check())
<div class="panel radius">
	<h6>{{ Auth::user()->fullname }}</h6>
	@if (Orchestra\Acl::make('diskus')->can('create topic'))
	<a href="{{ handles('diskus::topics/add') }}" class="small expand button radius">
		Add Topic
	</a>
	@endif
</div>
@else
<div class="panel radius">
	<a href="{{ handles('orchestra::register') }}" class="small expand button radius">
		Add Topic
	</a>
</div>
@endif