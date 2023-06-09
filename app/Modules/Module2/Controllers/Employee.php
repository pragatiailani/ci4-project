<?php

    namespace App\Modules\Module2\Controllers;
    use App\Modules\Module2\Models\EmployeeModel;
    use CodeIgniter\Controller;
    use CodeIgniter\Files\File;
    
    class Employee extends BaseController{
        protected $model;

        public function __construct(){
            $this->model = new EmployeeModel();
        }
        public function index(){
            $data["employees"] = $this->model->findAll();

            return view("employees/index", $data);
        }
        public function create(){

            $pfpPath = ''; // Initialize the variable

            $pfp = $this->request->getFile('pfp');

            if ($pfp && $pfp->isValid()) {
                // Generate a unique name for the file
                $newName = $pfp->getRandomName();

                // Move the uploaded file to the destination directory
                if ($pfp->move(FCPATH . 'assets/uploads', $newName)) {
                    $pfpPath = "assets/uploads/" . $newName;
                } else {
                    $pfpPath = "assets/uploads/default.jpg";
                }
            } else {
                $pfpPath = "assets/uploads/default.jpg";
            }

            $data = [
                "firstName" => $this->request->getPost("fname"),
                "lastName" => $this->request->getPost("lname"),
                "email" => $this->request->getPost("email"),
                "field" => $this->request->getPost("field"),
                "joinDate" => $this->request->getPost("jdate"),
                "pfp" => $pfpPath
            ];

            $this->model->insert($data);

            return redirect()->to("/module2");

        }
        public function edit($id){
            $data["employees"] = $this->model->find($id);

            return json_encode($data);
        }
        public function update($id){
            $data = [
                "firstName" => $this->request->getPost("fname"),
                "lastName" => $this->request->getPost("lname"),
                "email" => $this->request->getPost("email"),
                "field" => $this->request->getPost("field"),
                "joinDate" => $this->request->getPost("jdate")
            ];
            $this->model->update($id, $data);

            return json_encode(['success' => true]);
        }
        public function pfp($id){

            $pfpPath = ''; // Initialize the variable

            $pfp = $this->request->getFile('pfp');

            if ($pfp && $pfp->isValid()) {
                // Generate a unique name for the file
                $newName = $pfp->getRandomName();

                // Move the uploaded file to the destination directory
                if ($pfp->move(FCPATH . 'assets/uploads', $newName)) {
                    $pfpPath = "assets/uploads/" . $newName;
                } else {
                    // $pfpPath = "assets/uploads/default.jpg";
                    $pfpPath = "Problem 1";
                }
            } else {
                // $pfpPath = "assets/uploads/default.jpg";
                $pfpPath = "Problem 2";
            }

            // echo $pfpPath;
            $data = ["pfp" => $pfpPath];

            $this->model->update($id, $data);

            return json_encode(['success' => true]);
        }
        public function delete($id){
            $this->model->delete($id);

            return redirect()->to("/module2");
        }
    }

?>