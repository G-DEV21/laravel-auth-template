<?php 

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;

class LoginController extends Controller 
{
	public function __construct() 
	{

	}

	public function getIndex()
	{
		return view('login.index', [
				'title' => 'Login Page',
			]);
	}
}

