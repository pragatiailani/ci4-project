<?php

    namespace App\Modules\Module2\Models;

    use CodeIgniter\Model;

    class EmployeeModel extends Model{

        protected $table = 'employees';
        protected $primaryKey = 'id';
        protected $allowedFields = ['firstName', 'lastName', 'email', 'field', 'joinDate', 'pfp'];

        protected $useTimestamps = false;
    }
    

?>