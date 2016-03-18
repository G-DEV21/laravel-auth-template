<?php $formId = 'login-form'; ?>
@extends('layouts.master')

@section('title', $title)

@section('head') 
<h1>Laravel - Demo Login</h1>
@stop

@section('css')

@stop

@section('content')
<div class="widget-container">
	<div class="form-container">
		{!! Form::open(['url' => $actionUrl, 'method' => 'POST', 'id' => $formId]) !!}
        <div class='error-group'></div>
    	<div class='form-group'>
    		<div>
    			{{ Form::label('email', 'Email:') }}
    		</div>
    		<div>
    			{{ Form::text('email', '', ['placeholder' => 'your email']) }}
    		</div>
    	</div>
    	<div class='form-group'>
    		<div>
    			{{ Form::label('password', 'Password') }}
    		</div>
    		<div>
    			{{ Form::password('password', ['placeholder' => 'your password']) }}
    		</div>
    	</div>
    	<div class='form-group'>
    	   {{ Form::button('Submit', ['name' => 'send']) }}
    	</div>
		{!! Form::close() !!}
	</div>
    <div class='disclaimer'><a href="{{ route('homePage') }}">Home</a> or <a href="{{ route('registrationPage') }}">Register</a>
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
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 5
            },
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