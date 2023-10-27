<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UsersModel;
// use App\Models\LoginStatusModel;


class Login extends ResourceController
{
    use ResponseTrait;
    public function __construct()
    {
        helper(['form']);
    }

    public function index()
    {
        $data = array();
        if ($this->request->getMethod() == 'post') {

            $username = $this->request->getVar('name');
            $password = $this->request->getVar('password');


            $model = new UsersModel();
            $where = [
                'name' => $username,
                'password'  => $password
            ];
            $uname = $model->where('name', $username)->first();
            $pwd = $model->where('password', $password)->first();
            $data = $model->where($where)->first();

            $six_digit_random_number = random_int(100000, 999999);




            if ($data) {

                $epiData = array(
                    'otp' => $six_digit_random_number                      
                );
        
                // print_r($epiData);die();
                $epiModel = new UsersModel();
                $epiModel->set($epiData);
                $epiModel->where('id',$data['id']);
                $update = $epiModel->update();
                


                $sessionData = array(                   
                    'otp_temp'=> $six_digit_random_number
                );

                session()->set($sessionData);


                if ($update) {
                    return json_encode(array(
                        'result'    => 1,
                        'message'   => 'Please Enter the OTP'
                    ));
                } else {
                    return json_encode(array(
                        'result'    => 0,
                        'message'     => 'Something went wrong.....'
                    ));
                }

                // echo json_encode(array(
                //     'result'    => 1,
                //     'message'   => 'Please Enter the OTP'
                //     //    'login_count'    => $login_count
                // ));
            } else {

                if (!($uname) && !($pwd)) {
                    echo json_encode(array(
                        'result'    => 0,
                        'message'      => 'Invalid username & Password'
                    ));
                } elseif (!($uname)) {
                    echo json_encode(array(
                        'result'    => 2,
                        'message'      => 'Invalid username'
                    ));
                } elseif (!($pwd)) {
                    echo json_encode(array(
                        'result'    => 3,
                        'message'      => 'Invalid Password'
                    ));
                } else {
                    echo json_encode(array(
                        'result'    => 4,
                        'message'      => 'Please enter correctly'
                    ));
                }
            }
        }
    }
}
