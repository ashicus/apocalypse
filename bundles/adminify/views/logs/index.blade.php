<div class="row">

	<div class="span3">

		@if(!empty($logfiles))

		<ul class="nav nav-list bs-docs-sidenav affix">

			@foreach($logfiles as $key => $log)
				<li<?php if($key == 0): ?> class="active"<?php endif ?>><a href="{{URL::current()}}/{{$log}}"><i class="icon-chevron-right"></i> {{$log}}</a></li>
			@endforeach
			
		</ul>

		@endif

	</div>


	<div class="span9">

		<div class="well well-white main-cont">
			<div class="page-header">
				<h1>Logs</h1>
			</div>

			@if(!empty($logs))

			<ul class="unstyled logs">

			@foreach($logs as $log)

				@if(strpos($log, 'ERROR') !== FALSE)<li class="alert-error">@else<li>@endif
					{{$log}}
				</li>

			@endforeach

			</ul>

			@else

			<p class="lead">Looks like you haven't logged anything yet.</p>

			@endif

		</div>

	</div>

</div>