<?php

    namespace App\Modules\Module1\Controllers;
    use App\Modules\Module1\Models\AdminModel;
    use CodeIgniter\Controller;
    use CodeIgniter\Config\Services;
    use CodeIgniter\Files\File;
    
    class Admin extends BaseController{
        protected $model;

        public function __construct(){
            $this->session = Services::session();
            $this->model = new AdminModel();
        }
        public function index(){
            if($this->session->has('user_id'))
                return redirect()->to('/module1/dashboard');
            else
            // echo "OH NO!";
                return view("admins/index");
        }
        public function login(){
            
            $email = $this->request->getPost("email");
            $password = $this->request->getPost("password");

            // echo $email, $password;

            $user = $this->model->authenticate($email, $password);

            if ($user) {
                // Set session data
                $this->session = session();
                $this->session->set('user_id', $user['id']);
                // $this->session->set('name', $user['fullname']);
    
                // Redirect to the dashboard or any other page
                return redirect()->to('/module1/dashboard');
            } else {
                // Invalid credentials, show error message or redirect to login page
                return redirect()->to('/module1')->with('error', 'Invalid credentials');
            }
        }
        public function dashboard(){
            if($this->session->has('user_id'))
                return view("admins/logged_page");
            else
                // echo "OH NO!";
                return redirect()->to('/module1');
        }
        public function logout(){
            // Destroy session
            $this->session = session();
            $this->session->destroy();

            // Redirect to the login page
            return redirect()->to('/module1');
        }
    }

?>