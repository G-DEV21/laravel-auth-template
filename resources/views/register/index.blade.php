<?php $formId = 'registration-form'; ?>

@extends('layouts.master')

@section('title', $title)

@section('css')
.widget-container {
    padding-bottom: 80px;
}
@stop

@section('head') 
<h1>Laravel - Demo Register</h1>
@stop

@section('content')
	<div class="widget-container">
    <div class="form-container">
		{!! Form::open(['url' => $actionUrl , 'method' => 'POST', 'id' => $formId]) !!}
        <div class='error-group'></div>
    	<div class='form-group'>
    		<div>
    			{{ Form::label('fname', 'First Name:') }}
    		</div>
    		<div>
    			{{ Form::text('fname', '', ['placeholder' => 'Your first name']) }}
    		</div>
    	</div>
        <div class='form-group'>
            <div>
                {{ Form::label('Last Name:') }}
            </div>
            <div>
                {{ Form::text('lname', '', ['placeholder' => 'Your last name']) }}
            </div>
        </div>
    	<div class='form-group'>
    		<div>
    			{{ Form::label('Email Address:') }}
    		</div>
    		<div>
    			{{ Form::text('email', '', ['placeholder' => 'Your email']) }}
    		</div>
    	</div>
    	<div class='form-group'>
    		<div>
    			{{ Form::label('Password') }}
    		</div>
    		<div>
    			{{ Form::password('password', ['placeholder' => 'New Password', 'id' => 'password']) }}
    		</div>
    	</div>
    	<div class='form-group'>
    		<div>
    			{{ Form::label('Re-enter Password') }}
    		</div>
    		<div>
    			{{ Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'id' => 'password_confirmation']) }}
    		</div>
    	</div>
    	<div class='form-group'>
    	{{ Form::button('Submit', ['name' => 'send']) }}
    	</div>
		{!! Form::close() !!}
        </div>

        <div class='disclaimer'><a href="{{ route('homePage') }}">Home</a> or <a href="{{ route('loginPage') }}">Login</a>
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
            $(el).ajaxSubmit(function(data) {
               if (data.status === 1) {
                $(el).replaceWith('<div class="title">' + data.message + '</div>');
                setTimeout(function() {
                    window.location = "{{ route('homePage') }}";
                    }, 3000);
               } else {
                form.find('.error-group').html('');
                for(var i=0;i<data.errors.length; i++) {
                    form.find('.error-group').append('<p class="error">' + data.errors[i] + '</p>');
                }
               }
            });
        }
    });
    form.find('button[name="send"]').click(function() {
        form.submit();    
    })
    
});
@stop