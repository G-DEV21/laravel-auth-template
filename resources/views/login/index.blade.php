@extends('layouts.master')
@section('title', $title)
@section('content')
	<div id="widget-container">
		{!! Form::open(['url' => 'auth/login' , 'method' => 'POST' ]) !!}
    	{{ Form::token() }}
    	<div>
    		<div>
    			{{ Form::label('Email:') }}
    		</div>
    		<div>
    			{{ Form::text('email', '', ['placeholder' => 'your email']) }}
    		</div>
    	</div>
    	<div>
    		<div>
    			{{ Form::label('Password') }}
    		</div>
    		<div>
    			{{ Form::password('password', ['placeholder' => 'your password']) }}
    		</div>
    	</div>
    	<div>
    	{{ Form::button('submit')}}
    	</div>
		{!! Form::close() !!}
	</div>
@stop