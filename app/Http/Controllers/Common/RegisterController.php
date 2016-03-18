<?php

/**
 * Controller that handles user registration.
 * 
 * @author Jie Qiu
 * 
 */

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Request;
use Validator;
use Hash;
use App\Model\User;

class RegisterController extends Controller 
{
	public function getIndex()
	{
		return view('register.index', [
				'title' => 'Registration Page',
				'actionUrl' => route('registrationURL'),
			]);
	}

	public function postNewAccount()
	{

		$rules = [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:5',
            'fname' => 'required',
            'lname' => 'required',
        ];

        $vals = Request::only(['email', 'password', 'password_confirmation', 'fname', 'lname']);

        $validator = Validator::make($vals, $rules);


        if ($validator->fails()) {
        	return response()->json(['status' => 0, 'errors' =>  $validator->getMessageBag()->all()]);
        } else {
            $status = 1;
            // Create user object.
            $user = User::create([
                'email' => $vals['email'],
                'password' => Hash::make($vals['password']),
                'first_name' => $vals['fname'],
                'last_name' => $vals['lname'],
                'signup_date' => time(),
                'signup_ip' => Request::ip(),
            ]);

            $message = "User created.";
        	return response()->json(['status' => $status, 'message' => $message]);
      	}
	}
}