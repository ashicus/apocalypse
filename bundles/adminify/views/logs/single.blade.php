<div class="row">

	<div class="span3">
		<ul class="nav nav-list bs-docs-sidenav affix">

			@foreach($logfiles as $key => $log)
				<li<?php if($logfile == $log): ?> class="active"<?php endif ?>><a href="{{Adminify\Libraries\Helpers::url('logs/'.$log)}}"><i class="icon-chevron-right"></i> {{$log}}</a></li>
			@endforeach
			
		</ul>
	</div>


	<div class="span9">

		<div class="well well-white main-cont">
			<div class="page-header">
				<h1>Logs</h1>
			</div>

			<ul class="unstyled logs">

			@foreach($logs as $log)

				@if(strpos($log, 'ERROR') !== FALSE)<li class="alert-error">@else<li>@endif
					{{$log}}
				</li>

			@endforeach

			</ul>

		</div>

	</div>

</div>