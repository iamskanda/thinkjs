<?php 
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;


    class Logout extends ResourceController
    {
        use ResponseTrait;
        public function __construct()
        {
            helper(['form']);
        }
        public function logout(){       

            $session = \Config\Services::session();           
            $session->destroy();

            return redirect()->to(base_url());
        }
    }

?>