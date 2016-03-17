<?php 

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;

class AuthController extends Controller 
{
	public function postReg()
	{
		
		return response()->json(['status' => 1, 'message' => 'Account Created']);
	}
}