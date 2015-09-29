<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>{{$name}} &raquo; Login</title>
	{{Asset::styles()}}
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

	<div class="login-container">
		<div class="well well-white main-cont">

			<h4>Login to {{$name}}</h4>
			<hr>

			{{Form::open()}}

			{{Form::label('username', 'Username')}}
			{{Form::text('username')}}

			{{Form::label('password', 'Password')}}
			{{Form::password('password')}}

			<hr>
			{{Form::submit('Login', array('class' => 'btn btn-success'))}}

			{{Form::token()}}
			{{Form::close()}}

		</div>
	</div>


</body>
</html>