<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
    public function index()
    {
        //
    }

    public function authenticate()
    {
         // Get username and password from the login form
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $model = newUserModel();
        // Retrieve user data based on the provided email
        $data = $model->where('email', $email)->first();
        if($data && password_verify($password, $data[password_hash]))
        {
            $username = $data[first_name]. " " .$data[last_name];
            $_SESSION['user_id'] = $data['id'];
            $_SESSION['username'] = $username;
            return $this->$response->setJSON([
                'status'  => 'success',
                'message' => 'User logged in successfully'
            ]);
        }
        else {
            return $this->$response->setJSON([
                'status'  => 'error',
                'message' => 'Incorrect password'
            ]);
        }

    }
}
