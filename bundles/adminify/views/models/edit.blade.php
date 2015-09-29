<div class="well well-white main-cont">

<div class="page-header">
	<h2>Edit {{$model}}</h2>
</div>

@if($errors->has())
<div class="alert alert-error">
	<p><strong>Oops!</strong></p>
	<ul>
		{{implode('', $errors->all('<li>:message</li>'))}}
	</ul>
</div>
@endif

@if(Session::get('updated'))
<div class="alert alert-success">
	<p><strong>Awesome!</strong></p>
	<p>The {{$model}} was updated successfully!</p>
</div>
@endif

{{Form::open(null, 'PUT')}}

<div class="columns">

@foreach($structure as $field)
	
	<?php if(in_array($field->field, $excluded)) continue ?>

	{{Form::label($field->field, ucwords($field->field))}}

	<?php $name = $field->field ?>

	@if(stristr($field->type, 'text'))
		{{Form::textarea($field->field, $entry->$name)}}
	@elseif($field->field == 'password')
		{{Form::password($field->field)}}
	@else
		{{Form::text($field->field, $entry->$name)}}
	@endif

@endforeach

</div>

<div class="form-actions">
	{{Form::submit('Edit '.$model, array('class' => 'btn btn-success'))}}
</div>

{{Form::token()}}
{{Form::close()}}

</div>