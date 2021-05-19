<?php namespace App\Controllers;
use App\Models\TaskModel;
use Config\Services;
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type: application/json, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
class TaskController extends BaseController
{
    public function store(){
        $input = $this->validate([
            'title' => 'required|min_length[3]',
            'description' => 'required'
        ]);

        if(!$input){
            return json_encode([
                'message' => 'inputs error'
            ]);
        }

        $request = Services::request();
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

    public function read(){
//        $response = Services::response();
        $this->response->setContentType('Content-Type: application/json');
        $model = new TaskModel();
//        echo json_encode(
//             $model->findAll()
//        );
        $data = [
            'tasks' => $model->findAll(),
        ];

        return $this->response->setJSON($data);

        echo json_encode([
            'tasks' => $model->findAll()
        ]);
    }

    public function delete($id){
        $model = new TaskModel();
        $model->delete($id);
    }

    public function update($id){
        $model = new TaskModel();

        $request = Services::request();
        $data = [
            'title' => $request->getPost('title'),
            'description' => $request->getPost('description')
        ];

        $model->update($id,$data);

        return json_encode([
            'message' => 'success'
        ]);

    }

    public function getTasks(){
        $t = new TaskModel();
        $r =$t->select('*')->findAll();
        return json_encode(["response"=>$r]);
    }

    private function genericResponse($data,$code){
        return json_encode([
           "data"=>$data,
            "code"=>$code
        ]);
    }
}