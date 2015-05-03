@extends('layout.anonymous')

@section('title', 'View Users')

@section('main')

<ul>
@foreach ($users as $iter_user)
<li>
	Username: {{ $iter_user->username }}
</li>
@endforeach
</ul>

@stop