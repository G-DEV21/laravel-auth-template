<?php 

/**
 * Controller that handles user login.
 * 
 * @author Jie Qiu
 * 
 */

namespace App\Http\Controllers\Common;

use 
	App\Http\Controllers\Controller,
	Request,
	Validator,
	Hash,
	Session,
	App\Model\User;

class LoginController extends Controller 
{

	public function getIndex()
	{
		return view('login.index', [
				'title' => 'Login Page',
				'actionUrl' => route('loginAuthentication'),
			]);
	}

	public function postAuth()
	{
		$rules = [
            'email' => 'required|email',
            'password' => 'required|min:5',
        ];

        $vals = Request::only(['email', 'password']);

        $validator = Validator::make($vals, $rules);

        if ($validator->fails()) {
        	return response()->json(['status' => 0, 'errors' => $validator->getMessageBag()->all()]);
        } else {
            $status = 1;
            if (($user = User::where('email', $vals['email'])->first()) && Hash::check($vals['password'], $user->password)) {
            	Session::put('user', $user);
                $status = 1;
                $message = 'Login Successful.';
            } else {
               	$status = 0;
                $message = "Email and password does not match.";
                $message = Hash::make($vals['password']);
            }

        	return response()->json(['status' => $status, 'message' => $message]);
      	}
	}
}

