<div class="well well-white main-cont">

<div class="page-header">
	<h2>Add {{$model}}</h2>
</div>

@if($errors->has())
<div class="alert alert-error">
	<p><strong>Oops!</strong></p>
	<ul>
		{{implode('', $errors->all('<li>:message</li>'))}}
	</ul>
</div>
@endif

{{Form::open()}}

<div class="columns">

@foreach($structure as $field)
	
	<?php if(in_array($field->field, $excluded)) continue ?>

	{{Form::label($field->field, ucwords($field->field))}}

	<?php $name = $field->field ?>

	@if(stristr($field->type, 'text'))
		{{Form::textarea($field->field, Input::old($name))}}
	@elseif($field->field == 'password')
		{{Form::password($field->field)}}
	@else
		{{Form::text($field->field, Input::old($name))}}
	@endif

@endforeach

</div>

<div class="form-actions">
	{{Form::submit('Add '.$model, array('class' => 'btn btn-success'))}}
</div>

{{Form::token()}}
{{Form::close()}}

</div>