<?php 

/**
 * Controller that handles home page.
 * 
 * @author Jie Qiu
 * 
 */
namespace App\Http\Controllers\Common;

use 
	App\Http\Controllers\Controller,
	Session;

class HomeController extends Controller 
{
	public function getIndex()
	{
		return view('home.index',
			['title' => 'Home Page', 'user' => Session::get('user')]
		);
	}
}