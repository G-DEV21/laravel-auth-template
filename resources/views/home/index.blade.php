@extends('layouts.master')

@section('title', $title)

@section('css')
	div.disclaimer {
		position: relative!important;
		font-size: 16px!important;
		margin-top: 50px;
	}	
@stop

@section('head') 
<h1>Laravel - Demo</h1>
@stop

@section('content')
<?php if ($user) { ?>
<div class="title">Welcome back, {{ $user->first_name }} {{ $user->last_name }}</div>
<div class='disclaimer'>Not {{ $user->first_name }}? <a href="{{ route('loginPage') }}">login here</a> or <a href="{{ route('registrationPage') }}">register here</a></div>

<?php } else { ?>
<div class="title">Welcome, friend</div>
<div class='disclaimer'><a href="{{ route('loginPage') }}">login here</a> or <a href="{{ route('registrationPage') }}">register here</a></div>
<?php } ?>
@stop





