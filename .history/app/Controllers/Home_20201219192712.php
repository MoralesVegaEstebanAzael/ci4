<?php namespace App\Controllers;
use App\TaskModel;

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

	public function store(){
        $request = \Config\Services::request();
		$title  = $request->getPost('title');
		$description  = $request->getPost('description');
        $data = [
            'title' => $title,
            'description' => $description
        ];
        $taskModel = new TaskModel();
        $taskModel->insert($data);

        echo json_encode([
            "message" => "register crated"
        ]);
	}
	
	public function add(){
		$request = \Config\Services::request();
		$n1 = $request->getPost('n1');
		$n2 = $request->getPost('n2');

		if(is_numeric($n1) && is_numeric($n2)){
			$result = intval($n1) + intval($n2);
			$json = [
				"msg" =>$result
			];
		}else{
			$json = [
				"msg" =>'Ha ocurrido un error'
			];
		}
		echo json_encode($json);
	}
}
