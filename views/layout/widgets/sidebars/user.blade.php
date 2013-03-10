@if (Auth::check())
<div class="panel radius">
	<h6>Welcome {{ Auth::user()->fullname }}</h6>
</div>
@endif