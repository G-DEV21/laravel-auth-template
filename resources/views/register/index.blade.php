<?php $formId = 'registration-form'; ?>
@extends('layouts.master')
@section('title', $title)
@section('content')
	<div id="widget-container">
		{!! Form::open(['url' => $actionUrl , 'method' => 'POST', 'id' => $formId]) !!}
    	<div>
    		<div>
    			{{ Form::label('First Name:') }}
    		</div>
    		<div>
    			{{ Form::text('fname', 'First Name') }}
    		</div>
    		<div>
    			{{ Form::label('Last Name:') }}
    		</div>
    		<div>
    			{{ Form::text('lname', 'Last Name') }}
    		</div>
    	</div>
    	<div>
    		<div>
    			{{ Form::label('Email Address:') }}
    		</div>
    		<div>
    			{{ Form::text('email', '', ['placeholder' => 'Your email']) }}
    		</div>
    	</div>
    	<div>
    		<div>
    			{{ Form::label('Password') }}
    		</div>
    		<div>
    			{{ Form::password('password', ['placeholder' => 'New Password']) }}
    		</div>
    	</div>
    	<div>
    		<div>
    			{{ Form::label('Re-enter Password') }}
    		</div>
    		<div>
    			{{ Form::password('rpassword', ['placeholder' => 'Confirm Password']) }}
    		</div>
    	</div>
    	<div>
    	{{ Form::submit('submit', ['name' => 'submit']) }}
    	</div>
		{!! Form::close() !!}
	</div>
@stop
@section('js') 
    {{ Html::script(asset('library/jquery.validate.min.js')) }}
@stop
@section('script')
$(function() {
    $('#{!! $formId !!}').submit(function() {
        alert('Submitted');
    });
});
@stop