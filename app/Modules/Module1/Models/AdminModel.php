<?php

    namespace App\Modules\Module1\Models;

    use CodeIgniter\Model;

    class AdminModel extends Model{

        protected $table = 'admins';
        // protected $primaryKey = 'id';
        // protected $allowedFields = ['fullname', 'email', 'phone', 'password'];

        // protected $useTimestamps = false;

        public function authenticate($email, $password)
        {
            // Perform database query to check if the credentials are valid
            $user = $this->where('email', $email)->first();

            if ($user && md5($password) == $user['passwrd']) {
                return $user;
            }

            return null;
        }
    }

?>