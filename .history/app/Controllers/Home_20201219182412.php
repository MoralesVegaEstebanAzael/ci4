<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	//--------------------------------------------------------------------
	public function helloWorld(){
		$request = \Config\Services::request();
		$name  = $request->getPost('name');
		echo 'Hello World from Home Controller'.$name;
	}

	public function add(){
		$request = \Config\Services::request();
		$n1 = $request->getPost('n1');
		$n2 = $request->getPost('n2');

		
				
	}
}
