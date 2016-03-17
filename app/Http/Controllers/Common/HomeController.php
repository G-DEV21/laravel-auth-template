<?php 

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;

class HomeController extends Controller 
{

	public function getIndex()
	{
		return view('home.index',
			['title' => 'Home Page']);
	}
}

