<div class="navbar">
	<div class="navbar-inner">

		<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target="#cellonav">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>

		{{ HTML::link(handles('orchestra::resources/diskus'), 'Diskus', array('class' => 'brand')) }}

		<div id="cellonav" class="collapse nav-collapse">
		  	<ul class="nav">
		  		<li class="{{ URI::is('*/resources/diskus.topics*') ? 'active' : '' }}">
					{{ HTML::link(handles('orchestra::resources/diskus.topics'), 'Topics') }}
				</li>
			</ul>

			<ul class="nav pull-right">
				<li>
					<a href="{{ handles('diskus') }}" target="_blank"><i class="icon-home"></i> Website</a>
				</li>
			</ul>
		</div>
	</div>
</div>
