<?php


namespace App\Controllers;


use App\Models\UserModel;
use Config\Services;

class UserController extends BaseController
{

    public function index(){
        $this->load->helper('url');
        return view('login.php');
    }
    public function login(){
//        helper('url');
        $data=[];
        $request = Services::request();
        $response = Services::response();
        $response->setContentType('Content-Type: application/json');
        if($request->getMethod()=='post'){
            $rules = [
                'email' =>'required|min_length[6]|valid_email',
                'password' =>'required|min_length[8]|max_length[255]|validateUser[email,password]',
            ];
            $errors = [
                'password'=>[
                    'validateUser'=>'Email or Password don\'t match'
                ]
            ];

            if(!$this->validate($rules,$errors)){
                $data['validation']= $this->validator;
                return json_encode([
                    "success" => false,
                    "message" => "El correo electrónico o la contraseña no coinciden",
                    "data"=>$data
                ]);
            }else{
                $model = new UserModel();
                $user = $model->where('email',$request->getPost('email'))
                                ->first();
                $this->setUserSession($user);
                return redirect()->to('/dashboard');
                return json_encode([
                    "success" => true,
                    "message" => "Successful login"
                ]);
            }
        }

        return view('login.php');
    }

    private function setUserSession($user){
        $data = [
            'id'=>$user['id'],
            'name'=>$user['name'],
            'phone'=>$user['phone'],
            'email'=>$user['email'],
            'isLoggedIn'=>true
        ];

        session()->set($data);
        return true;
    }
    public function register(){
        $data=[];
        $request = Services::request();
        $response = Services::response();
        $response->setContentType('Content-Type: application/json');
        if($request->getMethod()=='post'){
            $rules = [
                'name' =>'required|min_length[3]',
                'email' =>'required|min_length[6]|valid_email|is_unique[users.email]',
                'password' =>'required|min_length[8]|max_length[255]',
                'phone'=>'required|min_length[10]|max_length[10]'
            ];

            if(!$this->validate($rules)){
                $data['validation']= $this->validator;


            }else{
                $user = new UserModel();

                $newData = [
                    'name'=>$request->getPost('name'),
                    'email'=>$request->getPost('email'),
                    'password'=>$request->getPost('password'),
                    'phone'=>$request->getPost('phone'),
                ];
                $user->save($newData);
                $sesion = session();
                $sesion->setFlashdata('success','Successful registration');

                return json_encode([
                   "success" => true,
                   "message" => "Successful registration",
                   "data"=> $user,
                ]);
                return redirect()->to('/');
            }
        }

        return json_encode([
           "succes"=>false,
            "message"=>'Error fields',
            "data"=>$data
        ]);
    }


    public function logout(){
        session()->destroy();
        return redirect()->to('/');
    }
}