<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LoginController extends BaseController
{

    public function index()
    {
        //
    }

    public function loginAuth()
    {
        $model = model('UserModel');
         // Get the email and password from the request
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $rules = $model->getValidationRules(['except' => ['email']]);


        // Validate password
        if (!$this->validate($rules)) {
            return $this->response->setStatusCode(400)->setJSON([
                'errors' => $this->validator->getError('password')
            ]);
        }

        //Check if the email field is empty
        if(!$email) {
            return $this->response->setStatusCode(400)->setJSON(['error'=> 'Please enter your email']);
        } else {
                //Retrieve data based on the provided email
                $data = $model->where('email', $email)->first();
                if($data && password_verify($password, $data['password']))
                {
                    $username = $data['first_name']. " " .$data['last_name'];
                    $_SESSION['user_id'] = $data['id'];
                    $_SESSION['username'] = $username;
                    return $this->response->setJSON([
                        'status'  => 'success',
                        'message' => 'User logged in successfully'
                    ]);
                }
                else {
                    return $this->response->setStatusCode(400)->setJSON([
                        'status'  => 'error',
                        'message' => 'Incorrect credentials'
                    ]);
                }
            }
        }

}
