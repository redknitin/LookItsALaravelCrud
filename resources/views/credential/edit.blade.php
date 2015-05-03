@extends('layout.anonymous')

@section('title', 'Edit User Account')

@section('main')
{!! Form::open() !!}
	<div>
		{!! Form::label('username', 'Username') !!}
		{!! Form::text('username') !!}
	</div>
	<div>
		{!! Form::label('password', 'Password') !!}
		{!! Form::password('password') !!}
	</div>
	<div>
		{!! Form::label('password_confirmation', 'Confirm Password') !!}
		{!! Form::password('password_confirmation') !!}
	</div>
	<div>
		{!! Form::label('email', 'Email') !!}
		{!! Form::email('email') !!}
	</div>
	<div>
		<input type="submit" value="Register" />
	</div>
{!! Form::close() !!}

@if($errors->any())
<div>
	{{$errors->first()}}
</div>
@endif

@stop