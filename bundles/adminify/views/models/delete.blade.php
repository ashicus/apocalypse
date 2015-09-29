<div class="well well-white main-cont">

<div class="page-header">
	<h2>Delete {{$model}}</h2>
</div>

<p class="lead">Are you sure you wanna delete this entry?</p>

<p class="lead"><strong>This action cannot be undone!</strong></p>

{{Form::open(null, 'DELETE')}}

<div class="form-actions">
	{{Form::submit('Yep! Delete the '.$model, array('class' => 'btn btn-danger'))}}
</div>

{{Form::token()}}
{{Form::close()}}

</div>