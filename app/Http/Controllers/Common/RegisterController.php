<?php 

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;

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
		return response()->json(['status' => 1, 'message' => 'Account Created']);
	}
}