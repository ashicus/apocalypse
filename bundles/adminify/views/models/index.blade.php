<div class="well well-white main-cont">

<div class="page-header clearfix">
	<h2 class="pull-left">{{$name}}</h2>
	{{HTML::link('/admin/models/add/'.$name, 'Add '.$model, array('class' => 'btn btn-success pull-right'))}}
</div>

@if(Session::get('added'))
<div class="alert alert-success">
	<p><strong>Awesome!</strong></p>
	<p>The {{$model}} was created successfully!</p>
</div>
@endif

@if(Session::get('deleted'))
<div class="alert alert-success">
	<p><strong>Awesome!</strong></p>
	<p>The {{$model}} was created successfully!</p>
</div>
@endif

@if(!empty($entries->results))

	<table class="table table-striped table-bordered">
		<thead>
			<th></th>
			@foreach($structure as $field)
	
				<?php if(in_array($field->field, $excluded)) continue ?>

				<th>
					{{ucwords($field->field)}}
				</th>

			@endforeach
		</thead>
		<tbody>

			@foreach($entries->results as $entry)

			<tr>
				<td>
					<div class="btn-group">
						<a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="icon icon-cog"></i><span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a href="{{Adminify\Libraries\Helpers::url("/models/edit/$name/".$entry->id)}}" title="Edit">
									Edit
								</a>
							</li>
							<li>
								<a href="{{Adminify\Libraries\Helpers::url("/models/delete/$name/".$entry->id)}}" title="Delete">
									Delete
								</a>
							</li>
						</ul>
					</div>
				</td>
				@foreach($structure as $field)

					<?php if(in_array($field->field, $excluded)) continue ?>
					<?php $ename = $field->field ?>
					<td>{{$entry->$ename}}</td>

				@endforeach
			</tr>

			@endforeach

		</tbody>
	</table>
	{{$entries->links()}}
@endif

</div>