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
    			{{ Form::text('fname', '', ['placeholder' => 'Your first name']) }}
    		</div>
    		<div>
    			{{ Form::label('Last Name:') }}
    		</div>
    		<div>
    			{{ Form::text('lname', '', ['placeholder' => 'Your last name']) }}
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
    			{{ Form::password('password', ['placeholder' => 'New Password', 'id' => 'password']) }}
    		</div>
    	</div>
    	<div>
    		<div>
    			{{ Form::label('Re-enter Password') }}
    		</div>
    		<div>
    			{{ Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'id' => 'password_confirmation']) }}
    		</div>
    	</div>
    	<div>
    	{{ Form::button('Submit', ['name' => 'send']) }}
    	</div>
		{!! Form::close() !!}
	</div>
@stop
@section('js') 
    {{ Html::script(asset('library/jquery.validate.min.js')) }}
    {{ Html::script(asset('library/jquery.form.min.js')) }}
@stop
@section('script')
$(function() {
    var form = $('#{!! $formId !!}');
    form.validate({
        rules : {
            fname: 'required',
            lname: 'required',
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 5
            },
            password_confirmation: {
                 required: true,
                 minlength: 5,
                 equalTo: '#password'
            }
        },
        submitHandler: function(el) {
            console.log(el);
            $(el).ajaxSubmit(function() {
               console.log(arguments); 
            });
        }
    });
    form.find('button[name="send"]').click(function() {
        form.submit();    
    })
    
});
@stop