<div class="well well-white main-cont">

<div class="page-header">
	<h2>SQL Console</h2>
</div>

@if(Session::get('result'))

	<?php $result = Session::get('result') ?> 

	@if(is_array($result))

		<?php $keys = array_keys((array)$result[0]) ?>

		<table class="table table-striped table-bordered">
			<thead>
				@foreach($keys as $field)
					<th>{{ucwords($field)}}</th>
				@endforeach
			</thead>
			<tbody>
				
				@foreach($result as $row)

				<tr>
					@foreach($row as $field)
						<td>{{$field}}</td>
					@endforeach
				</tr>

				@endforeach

			</tbody>
		</table>

	@endif

@else

{{Form::open()}}

{{Form::textarea('console', null, array('id' => 'console'))}}

<div class="form-actions">
	{{Form::submit('Run SQL', array('class' => 'btn btn-success'))}}
</div>

{{Form::close()}}

@endif

</div>