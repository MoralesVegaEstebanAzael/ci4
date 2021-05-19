<?php namespace App\Controllers;

class TaskController extends BaseController
{
    public function store(){
        $request = \Config\Services::request();
		$title  = $request->getPost('title');
		$description  = $request->getPost('description');

        $data = [
            'title' => $title,
            'description' => $description
        ];
    }
}