<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
// use App\Models\ApiModel;
use App\Models\studentDetails_m;
use App\Models\branchDetails_m;
use App\Models\UsersModel;
use App\Models\projectModel;
use App\Models\master_m;
use App\Models\subMaster_m;
use App\Models\contractor_m;
use App\Models\subContractor_m;
use App\Models\Attendance_m;

use App\Models\meeting_m;




class Dashboard extends ResourceController
{
    use ResponseTrait;
    public function __construct()
    {
        helper(['form', 'url']);


        require_once APPPATH . 'ThirdParty/ssp.class.php';
        $this->db = db_connect();
    }

    public function Logout()
    {
        // $session=session();
        // $array_items = ['dr_id','name','gamer_id','email'];
        // $session->remove($array_items);
        // $session->destroy();

        // $dr_id = session()->get('dr_id');
        // session_destroy($dr_id);
        // $this->session->sess_destroy();

        // session()->remove($dr_id);

        $session = \Config\Services::session();
        $session->destroy();

        return redirect()->to(base_url());
    }







    public function get_data_branch()
    {

        $id = $this->request->getVar('id');
        $model  = new branchDetails_m();
        $data = $model->where('id', $id)->first();
        // $dats['img'] = $data;
        if ($data) {
            return json_encode(array(
                'result'    => 1,
                'message'   => $data
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Something went wrong...'
            ));
        }
    }

    public function update_branch()
    {

        // print_r('hi');die();



        $name = session()->get('name');

        $id_update  = $this->request->getVar('id_update');

        $branch  = $this->request->getVar('branch');
        $address  = $this->request->getVar('address');
        $email  = $this->request->getVar('email');
        $mobile  = $this->request->getVar('mobile');
        $person_name  = $this->request->getVar('person_name');
        $gender  = $this->request->getVar('gender');

        date_default_timezone_set('Asia/Kolkata');
        $updated_at = date('d-m-Y H:i:s', time());

        $Data = array(

            'name' => $branch,
            'address' => $address,
            'email' => $email,
            'phonenumber' => $mobile,
            'contactperson' => $person_name,
            'gender' => $gender,
            'updated_by' => $name,
            'updated_at' => $updated_at,

        );

        $Model = new branchDetails_m();
        $Model->set($Data);
        $Model->where('id', $id_update);
        $update = $Model->update();

        if ($update) {
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Updated Successfull.....'

            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'     => 'Something went wrong.....'
            ));
        }
    }

    public function change_branch()
    {


        $branch_select_id = $this->request->getVar('org');
        // $entry_id = $this->request->getVar('entry_id');   

        // $dr_id = session()->get('name');


        $model  = new UsersModel();
        $details = $model->where('branch_id', $branch_select_id)->first();



        // print_r($branch_select_id);die();
        $sessionData = array(
            'employ_name' => $details['name'],
            'employ_id' => $details['id'],
            'branch_select_id' => $branch_select_id
            // 'role_id'=>$details['role_id']  
        );
        session()->set($sessionData);

        // print_r(session()->get());die();

        echo json_encode(array(
            'result'    => 1,
            'message'   => 'valid'
        ));
    }



    public function student_page()
    {

        $branch_select_id = session()->get('branch_select_id');
        $id = session()->get('id');


        // print_r($id);die();

        if ($id) {

            if ($branch_select_id) {

                $branchDetails = new branchDetails_m();
                $details  = $branchDetails->get()->getResultArray();
                $data['branchdata'] = $details;

                return view('student_v', $data);
            } else {
            }
        } else {
            return redirect()->to(base_url());
        }
    }

    public function student_details()
    {

        $db = \Config\Database::connect();

        $builder = $db->table('branchdetails');
        $query = $builder->select("name,id");
        $query = $builder->get();
        $record = $query->getResult();

        $data['branch'] = $record;

        return view('student_details', $data);
    }

    public function branch_page()
    {

        $id = session()->get('id');

        if ($id) {
            $branchDetails = new branchDetails_m();
            $details  = $branchDetails->get()->getResultArray();
            $data['branchdata'] = $details;

            return view('branch_page', $data);
        } else {
            return redirect()->to(base_url());
        }
    }







    public function employee_page()
    {
        print_r('hi');
        die();
    }


    /* NEW */


    public function users_v()
    {
        $id = session()->get('id');

        if ($id) {
            $branchDetails = new projectModel();
            $details  = $branchDetails->get()->getResultArray();
            $data['branchdata'] = $details;

            return view('users_v', $data);
        } else {
            // return redirect()->route("/");
            return redirect()->to(base_url());
        }
    }

    public function Project_v()
    {

        $id = session()->get('id');

        if ($id) {
            $branchDetails = new projectModel();
            $details  = $branchDetails->get()->getResultArray();
            $data['branchdata'] = $details;

            return view('project_page', $data);
        } else {
            return redirect()->to(base_url());
        }
    }

    public function show_all_branch_data()
    {

        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
            "port" => $this->db->port
        );

        // print_r($dbDetails);die();

        $table = "projectdetails";
        $primaryKey = "id";

        $columns = array(
            array(
                'db' => 'id',
                'dt' => 0,
                'field' => 'id'
            ),
            array(
                'db' => 'name',
                'dt' => 1,
                'field' => 'name'
            ),
            array(
                'db' => 'facing',
                'dt' => 2,
                'field' => 'facing'
            ),
            array(
                'db' => 'builduparea',
                'dt' => 3,
                'field' => 'builduparea'
            ),
            array(
                'db' => 'location',
                'dt' => 4,
                'field' => 'location'
            ),
            array(
                'db' => 'startdate',
                'dt' => 5,
                'field' => 'startdate'
            ),
            array(
                'db' => 'uploadfile',
                'dt' => 6,
                'field' => 'uploadfile'
            ),
            array(
                'db' => 'id',
                'dt' => 7,
                'formatter' => function ($d, $row) {
                    return "<div class='btn-group'>
                                <i class='fas fa-edit' data-id='" . $row['id'] . "' id='updateCountryBtn' data-toggle='tooltip' data-placement='top' title='Update'></i>
                                <i class='fas fa-trash-alt' data-id='" . $row['id'] . "' id='deleteCountryBtn' data-toggle='tooltip' data-placement='top' title='Delete'></i>
                                <i class='fas fa-server' data-id='" . $row['id'] . "' id='ProjectWorkCountryBtn' data-toggle='tooltip' data-placement='top' title='Project work plan'></i>
                            </div>";
                }
            ),
        );

        // $joinQuery = "FROM `{$table}` AS `c` LEFT JOIN `upload_files` AS `uf` ON (`uf`.`categories_id` = `c`.`id`)";
        echo json_encode(
            \SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
        );
    }

    public function add_new_branch()
    {

        $created_by = session()->get('name');

        // print_r($created_by);die();


        $name = $this->request->getVar('name');
        $location = $this->request->getVar('location');
        $face = $this->request->getVar('face');
        $area = $this->request->getVar('area');
        $dimension = $this->request->getVar('dimension');
        $start_date = $this->request->getVar('start_date');
        $note = $this->request->getVar('note');

        $file = $this->request->getFile('file');

        $file_name = '';

        if ($file->isValid() && !$file->hasMoved()) {
            $file_name = $file->getName();
            $file->move('upload_file/', $file_name);
        }


        $newBranch = array(
            'name' => $name,
            'location' => $location,
            'facing' => $face,
            'builduparea' => $area,
            'landdimension' => $dimension,
            'startdate' => $start_date,
            'uploadfile' => $file_name,
            'note' => $note,
            'created_by' => $created_by
        );

        // print_r($newBranch);die();
        $Model = new projectModel();
        $Model->save($newBranch);
        $insertedID = $Model->insertID();
        if ($insertedID) {
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Successful'
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'     => 'Something went wrong.....'
            ));
        }
    }

    public function edit_project_data()
    {

        // $org_id = session()->get('org_id');
        $id  = $this->request->getVar('id');
        $model  = new projectModel();
        // $model->where('org_id',$org_id);
        $data = $model->where('id', $id)->first();

        // print_r($data);die();


        if ($data) {
            return json_encode(array(
                'result'    => 1,
                'message'   => $data
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Something went wrong...'
            ));
        }
    }

    public function delete_project()
    {
        // $org_id = session()->get('org_id');
        $id  = $this->request->getVar('id');

        // print_r($id);die();
        $delete = new projectModel();
        $delete->where('id', $id);
        // $delete->where('org_id',$org_id);
        $deleteID = $delete->delete();

        if ($deleteID) {
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Deleted Successfully'
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Error'
            ));
        }
    }

    public function add_new_user()
    {

        $created_by = session()->get('name');

        // print_r($created_by);die();


        $name = $this->request->getVar('name');
        $phone = $this->request->getVar('phone');
        $mail = $this->request->getVar('mail');
        $address = $this->request->getVar('address');
        $dob = $this->request->getVar('dob');
        $password = $this->request->getVar('password');
        $role = $this->request->getVar('role');

        $photo = $this->request->getFile('photo');

        $image = '';

        if ($photo->isValid() && !$photo->hasMoved()) {
            $image = $photo->getName();
            $photo->move('upload_file/users', $image);
        }


        $newBranch = array(

            'name' => $name,
            'phoneNumber' => $phone,
            'email' => $mail,
            'address' => $address,
            'dob' => $dob,
            'image' => $image,
            'password' => $password,
            'role_id' => $role,
            'created_by' => $created_by
        );

        // print_r($newBranch);die();
        $Model = new UsersModel();
        $Model->save($newBranch);
        $insertedID = $Model->insertID();
        if ($insertedID) {
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Successful'
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'     => 'Something went wrong.....'
            ));
        }
    }


    public function show_all_student_data()
    {

        $branch_select_id = session()->get('branch_select_id');

        // print_r($branch_select_id);die();


        // $model = new studentDetails_m();
        // $model->where('branch_id',$branch_select_id);

        // // $model->orderBy('fname','ASC');

        // $data  = $model->get()->getResultArray();


        // return $this->respondCreated($data);

        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
            "port" => $this->db->port
        );

        // print_r($dbDetails);die();

        $table = "userlogin";
        $primaryKey = "id";

        $columns = array(
            array(
                'db' => 'id',
                'dt' => 0,
                'field' => 'id'
            ),
            array(
                'db' => 'image',
                'dt' => 1,
                'field' => 'image'
            ),
            array(
                'db' => 'name',
                'dt' => 2,
                'field' => 'name'
            ),
            array(
                'db' => 'phoneNumber',
                'dt' => 3,
                'field' => 'phoneNumber'
            ),
            array(
                'db' => 'address',
                'dt' => 4,
                'field' => 'address'
            ),
            array(
                'db' => 'email',
                'dt' => 5,
                'field' => 'email'
            ),
            array(
                'db' => 'role_id',
                'dt' => 6,
                'field' => 'role_id'
            ),
            array(
                'db' => 'id',
                'dt' => 7,
                'formatter' => function ($d, $row) {
                    return "<div class='btn-group'>
                               


                                <button class='btn btn-primary btn-sm' data-id='" . $row['id'] . "' id='updateCountryBtn'>Update</button>
                                <button class='btn btn-danger btn-sm' data-id='" . $row['id'] . "' id='deleteCountryBtn'>Delete</button>
                                <button class='btn btn-warning btn-sm' data-id='" . $row['id'] . "' id='assessmentCountryBtn'>Project Assessment</button>
                            </div>";
                }
            ),
        );

        // $joinQuery = "FROM `{$table}` AS `c` LEFT JOIN `upload_files` AS `uf` ON (`uf`.`categories_id` = `c`.`id`)";
        echo json_encode(
            \SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
        );
    }

    public function edit_user()
    {
        // $org_id = session()->get('org_id');
        $id  = $this->request->getVar('id');
        $model  = new UsersModel();
        // $model->where('org_id',$org_id);
        $data = $model->where('id', $id)->first();

        // print_r($data);die();


        if ($data) {
            return json_encode(array(
                'result'    => 1,
                'message'   => $data
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Something went wrong...'
            ));
        }
    }

    public function delete_user()
    {
        // $org_id = session()->get('org_id');
        $id  = $this->request->getVar('id');

        // print_r($id);die();
        $delete = new UsersModel();
        $delete->where('id', $id);
        // $delete->where('org_id',$org_id);
        $deleteID = $delete->delete();

        if ($deleteID) {
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Deleted Successfully'
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Error'
            ));
        }
    }

    public function assessment_project()
    {

        $id  = $this->request->getVar('id');

        // print_r($id);die();

        // $org_id = session()->get('org_id');
        $model  = new UsersModel();
        $model->where('id', $id);
        $model->select('project_assessment');
        $data = $model->get()->getResultArray();
        // $data['projects'] = $details;

        // print_r($details);die();


        // $model->where('org_id',$org_id);
        // $data = $model->where('id',$id)->first();

        // print_r($data);die();


        if ($data) {
            return json_encode(array(
                'result'    => 1,
                'message'   => $data
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Something went wrong...'
            ));
        }
    }

    public function project_assessment_add()
    {
        $created_by = session()->get('name');

        // print_r($created_by);die();
        $projects = $this->request->getVar('countries');
        $user_id = $this->request->getVar('Assess_id');

        // print_r($projects);die();
        $newBranch = array(
            'project_assessment' => $projects
        );

        // print_r($newBranch);die();
        $Model = new UsersModel();
        $Model->set($newBranch);
        $Model->where('id', $user_id);
        $updateID = $Model->update();
        if ($updateID) {
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Successful'
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'     => 'Something went wrong.....'
            ));
        }
    }

    public function project_work_plan()
    {
        $id = session()->get('id');

        $projects_id = $_GET['id'];

        // print_r();die();

        if ($id) {
            $branchDetails = new projectModel();
            $details  = $branchDetails->get()->getResultArray();
            $data['branchdata'] = $details;


            $branchDetails->where('id', $projects_id);
            $project_details  = $branchDetails->get()->getResultArray();
            $data['project'] = $project_details;


            // print_r($project_details);die();

            return view('project_work_plan', $data);
        } else {
            // return redirect()->route("/");
            return redirect()->to(base_url());
        }
    }

    public function Indent()
    {
        $id = session()->get('id');

        if ($id) {
            $branchDetails = new projectModel();
            $details  = $branchDetails->get()->getResultArray();
            $data['branchdata'] = $details;

            // print_r($details);die();

            return view('indent_v', $data);
        } else {
            // return redirect()->route("/");
            return redirect()->to(base_url());
        }
    }


    public function Master()
    {
        $id = session()->get('id');

        if ($id) {
            $branchDetails = new projectModel();
            $details  = $branchDetails->get()->getResultArray();
            $data['branchdata'] = $details;

            return view('master', $data);
        } else {
            // return redirect()->route("/");
            return redirect()->to(base_url());
        }
    }

    public function show_all_master_data()
    {
        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
            "port" => $this->db->port
        );

        // print_r($dbDetails);die();

        $table = "master";
        $primaryKey = "id";

        $columns = array(
            array(
                'db' => 'id',
                'dt' => 0,
                'field' => 'id'
            ),
            array(
                'db' => 'master_name',
                'dt' => 1,
                'field' => 'master_name'
            ),
            array(
                'db' => 'created_at',
                'dt' => 2,
                'field' => 'created_at'
            ),
            array(
                'db' => 'id',
                'dt' => 3,
                'formatter' => function ($d, $row) {
                    return "<div class='btn-group'>

                                <button class='btn btn-primary btn-sm' data-id='" . $row['id'] . "' id='updateCountryBtn'>Update</button>
                                <button class='btn btn-danger btn-sm' data-id='" . $row['id'] . "' id='deleteCountryBtn'>Delete</button>
                                <button class='btn btn-warning btn-sm' data-id='" . $row['id'] . "' id='subMasterCountryBtn'>Sub Master</button>
                            </div>";
                }
            ),
        );

        // $joinQuery = "FROM `{$table}` AS `c` LEFT JOIN `upload_files` AS `uf` ON (`uf`.`categories_id` = `c`.`id`)";
        echo json_encode(
            \SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
        );
    }

    public function add_master_data()
    {
        $created_by = session()->get('name');
        $master_name = $this->request->getVar('master_name');

        $master = array(

            'master_name' => $master_name,
            'created_by' => $created_by
        );

        // print_r($master);die();
        $Model = new master_m();
        $Model->save($master);
        $insertedID = $Model->insertID();
        if ($insertedID) {
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Successful'
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'     => 'Something went wrong.....'
            ));
        }
    }

    public function update_master_data()
    {
        // $org_id = session()->get('org_id');
        $id  = $this->request->getVar('id');
        $model  = new master_m();
        $data = $model->where('id', $id)->first();

        // print_r($data);die();


        if ($data) {
            return json_encode(array(
                'result'    => 1,
                'message'   => $data
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Something went wrong...'
            ));
        }
    }

    public function delete_master()
    {
        // $org_id = session()->get('org_id');
        $id  = $this->request->getVar('id');

        // print_r($id);die();
        $delete = new master_m();
        $delete->where('id', $id);
        // $delete->where('org_id',$org_id);
        $deleteID = $delete->delete();

        if ($deleteID) {
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Deleted Successfully'
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Error'
            ));
        }
    }

    public function sub_master()
    {
        $id = session()->get('id');

        $master_id = $_GET['id'];
        // print_r($master_id);die();


        if ($id) {
            $branchDetails = new projectModel();
            $details  = $branchDetails->get()->getResultArray();
            $data['branchdata'] = $details;

            $submaster = new master_m();
            $submaster->where('id', $master_id);
            $submaster_details  = $submaster->get()->getResultArray();
            $data['master'] = $submaster_details;

            // print_r($submaster_details);die();

            return view('subMaster', $data);
        } else {
            // return redirect()->route("/");
            return redirect()->to(base_url());
        }
    }


    public function show_all_sub_master_data()
    {
        // $master_id = $_GET['id'];
        $master_id = $this->request->getVar('cat');

        // print_r($master_id); die();
        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
            "port" => $this->db->port
        );

        $table = "sub_master";
        $primaryKey = "id";

        $columns = array(
            array(
                "db" => "id",
                "dt" => 0,
            ),
            // array(
            //     "db"=>"field_names",
            //     "dt"=>1,
            // ),
            array(
                "db" => "master_name",
                "dt" => 1,
            ),
            array(
                "db" => "submaster_name",
                "dt" => 2,
            ),
            array(
                "db" => "id",
                "dt" => 3,
                "formatter" => function ($d, $row) {
                    return "<div class='btn-group'>
                                

                                <button class='btn btn-primary btn-sm' data-id='" . $row['id'] . "' id='updateCountryBtn'>Update</button>
                                <button class='btn btn-danger btn-sm' data-id='" . $row['id'] . "' id='deleteCountryBtn'>Delete</button>

                             </div>";
                }
            ),
        );

        echo json_encode(
            \SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, null, "master_id='$master_id'")
        );
    }

    public function sub_master_add()
    {
        $created_by = session()->get('name');
        $master_name = $this->request->getVar('master_name');
        $master_id = $this->request->getVar('master_id');
        $sub_master_name = $this->request->getVar('sub_master_name');


        $master = array(

            'submaster_name' => $sub_master_name,
            'master_id' => $master_id,
            'master_name' => $master_name,
            'created_by' => $created_by
        );

        // print_r($master);die();
        $Model = new subMaster_m();
        $Model->save($master);
        $insertedID = $Model->insertID();
        if ($insertedID) {
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Successful'
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'     => 'Something went wrong.....'
            ));
        }
    }

    public function contractor_creation()
    {
        $id = session()->get('id');

        if ($id) {
            $branchDetails = new projectModel();
            $details  = $branchDetails->get()->getResultArray();
            $data['branchdata'] = $details;

            return view('contractor_creation', $data);
        } else {
            // return redirect()->route("/");
            return redirect()->to(base_url());
        }
    }

    public function show_all_contractor_data()
    {
        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
            "port" => $this->db->port
        );

        // print_r($dbDetails);die();

        $table = "contractor_creation";
        $primaryKey = "id";

        $columns = array(
            array(
                'db' => 'id',
                'dt' => 0,
                'field' => 'id'
            ),
            array(
                'db' => 'name',
                'dt' => 1,
                'field' => 'name'
            ),
            array(
                'db' => 'created_at',
                'dt' => 2,
                'field' => 'created_at'
            ),
            array(
                'db' => 'id',
                'dt' => 3,
                'formatter' => function ($d, $row) {
                    return "<div class='btn-group'>

                                <button class='btn btn-primary btn-sm' data-id='" . $row['id'] . "' id='updateCountryBtn'>Update</button>
                                <button class='btn btn-danger btn-sm' data-id='" . $row['id'] . "' id='deleteCountryBtn'>Delete</button>
                                <button class='btn btn-success btn-sm' data-id='" . $row['id'] . "' id='subMasterCountryBtn'>Sub Master</button>
                            </div>";
                }
            ),
        );

        // $joinQuery = "FROM `{$table}` AS `c` LEFT JOIN `upload_files` AS `uf` ON (`uf`.`categories_id` = `c`.`id`)";
        echo json_encode(
            \SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
        );
    }

    public function add_contractor_data()
    {
        $created_by = session()->get('name');
        $master_name = $this->request->getVar('master_name');

        $master = array(

            'name' => $master_name,
            'created_by' => $created_by
        );

        // print_r($master);die();
        $Model = new contractor_m();
        $Model->save($master);
        $insertedID = $Model->insertID();
        if ($insertedID) {
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Successful'
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'     => 'Something went wrong.....'
            ));
        }
    }

    public function update_contractor_data()
    {
        // $org_id = session()->get('org_id');
        $id  = $this->request->getVar('id');
        $model  = new contractor_m();
        $data = $model->where('id', $id)->first();

        // print_r($data);die();


        if ($data) {
            return json_encode(array(
                'result'    => 1,
                'message'   => $data
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Something went wrong...'
            ));
        }
    }

    public function delete_contractor()
    {
        // $org_id = session()->get('org_id');
        $id  = $this->request->getVar('id');

        // print_r($id);die();
        $delete = new contractor_m();
        $delete->where('id', $id);
        // $delete->where('org_id',$org_id);
        $deleteID = $delete->delete();

        if ($deleteID) {
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Deleted Successfully'
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Error'
            ));
        }
    }
    public function sub_contractor()
    {
        $id = session()->get('id');

        $master_id = $_GET['id'];
        // print_r($master_id);die();


        if ($id) {
            $branchDetails = new projectModel();
            $details  = $branchDetails->get()->getResultArray();
            $data['branchdata'] = $details;

            $submaster = new contractor_m();
            $submaster->where('id', $master_id);
            $submaster_details  = $submaster->get()->getResultArray();
            $data['master'] = $submaster_details;

            // print_r($submaster_details);die();

            return view('subContractor', $data);
        } else {
            // return redirect()->route("/");
            return redirect()->to(base_url());
        }
    }

    public function show_all_sub_contractor_data()
    {
        // $master_id = $_GET['id'];
        $contractor_id = $this->request->getVar('cat');

        // print_r($master_id); die();
        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
            "port" => $this->db->port
        );

        $table = "sub_contractor_creation";
        $primaryKey = "id";

        $columns = array(
            array(
                "db" => "id",
                "dt" => 0,
            ),
            array(
                "db" => "name",
                "dt" => 1,
            ),
            array(
                "db" => "phone",
                "dt" => 2,
            ),
            array(
                "db" => "male",
                "dt" => 3,
            ),
            array(
                "db" => "male_helper",
                "dt" => 4,
            ),
            array(
                "db" => "female",
                "dt" => 5,
            ),
            array(
                "db" => "female_helper",
                "dt" => 6,
            ),
            array(
                "db" => "id",
                "dt" => 7,
                "formatter" => function ($d, $row) {
                    return "<div class='btn-group'>
                               

                                <button class='btn btn-primary btn-sm' data-id='" . $row['id'] . "' id='updateCountryBtn'>Update</button>
                                <button class='btn btn-danger btn-sm' data-id='" . $row['id'] . "' id='deleteCountryBtn'>Delete</button>

                             </div>";
                }
            ),
        );

        echo json_encode(
            \SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, null, "contractor_id='$contractor_id'")
        );
    }

    public function sub_contractor_add()
    {
        $created_by = session()->get('name');
        $contractor_type = $this->request->getVar('master_name');
        $contractor_id = $this->request->getVar('master_id');
        $contractor_name = $this->request->getVar('sub_master_name');
        $sub_phone_number = $this->request->getVar('sub_phone_number');
        $male = $this->request->getVar('male');
        $female = $this->request->getVar('female');
        $male_helper = $this->request->getVar('male_helper');
        $female_helper = $this->request->getVar('female_helper');

        $male_ot = $this->request->getVar('male_ot');
        $female_ot = $this->request->getVar('female_ot');
        $male_helper_ot = $this->request->getVar('male_helper_ot');
        $female_helper_ot = $this->request->getVar('female_helper_ot');

        $master = array(

            'contractor_id' => $contractor_id,
            'contractor_type' => $contractor_type,
            'name' => $contractor_name,
            'phone' => $sub_phone_number,
            'male' => $male,
            'female' => $female,
            'male_helper' => $male_helper,
            'female_helper' => $female_helper,

            'male_ot' => $male_ot,
            'female_ot' => $female_ot,
            'male_helper_ot' => $male_helper_ot,
            'female_helper_ot' => $female_helper_ot,

            'created_by' => $created_by
        );

        // print_r($master);die();
        $Model = new subContractor_m();
        $Model->save($master);
        $insertedID = $Model->insertID();

        if ($insertedID) {
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Successful'
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'     => 'Something went wrong.....'
            ));
        }
    }



    public function find_sub_contractor()
    {
        $id = $this->request->getVar('id');

        $branchDetails = new subContractor_m();
        $branchDetails->where('contractor_id', $id);
        $details  = $branchDetails->get()->getResultArray();

        if ($details) {
            return json_encode(array(
                'result'    => 1,
                'message'   => $details
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Something went wrong...'
            ));
        }
    }

    public function show_all_project_work_plan_data()
    {

        // $master_id = $_GET['id'];
        $project_id = $this->request->getVar('cat');

        // print_r($master_id); die();
        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
            "port" => $this->db->port
        );

        $table = "project_work_plane";
        $primaryKey = "id";

        $columns = array(
            array(
                "db" => "id",
                "dt" => 0,
            ),
            array(
                "db" => "name",
                "dt" => 1,
            ),
            array(
                "db" => "start_date",
                "dt" => 2,
            ),
            array(
                "db" => "end_date",
                "dt" => 3,
            ),
            array(
                "db" => "total",
                "dt" => 4,
            ),
            array(
                "db" => "note",
                "dt" => 5,
            ),
            array(
                "db" => "id",
                "dt" => 6,
                "formatter" => function ($d, $row) {
                    return "<div class='btn-group'>
                               

                                <button class='btn btn-primary btn-sm' data-id='" . $row['id'] . "' id='updateCountryBtn'>Update</button>
                                <button class='btn btn-danger btn-sm' data-id='" . $row['id'] . "' id='deleteCountryBtn'>Delete</button>

                             </div>";
                }
            ),
        );

        echo json_encode(
            \SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, null, "project_id='$project_id'")
        );
    }

    public function project_work_plan_add()
    {
        $created_by = session()->get('name');

        print_r($created_by);
        die();
        // $contractor_type = $this->request->getVar('master_name');
        // $contractor_id = $this->request->getVar('master_id');
        // $contractor_name = $this->request->getVar('sub_master_name');
        // $sub_phone_number = $this->request->getVar('sub_phone_number');
        // $male = $this->request->getVar('male');
        // $female = $this->request->getVar('female');
        // $male_helper = $this->request->getVar('male_helper');
        // $female_helper = $this->request->getVar('female_helper');

        // $male_ot = $this->request->getVar('male_ot');
        // $female_ot = $this->request->getVar('female_ot');
        // $male_helper_ot = $this->request->getVar('male_helper_ot');
        // $female_helper_ot = $this->request->getVar('female_helper_ot');

        // $master = array(

        //     'contractor_id' => $contractor_id,
        //     'contractor_type' => $contractor_type,
        //     'name' => $contractor_name,
        //     'phone' => $sub_phone_number,
        //     'male' => $male,
        //     'female' => $female,
        //     'male_helper' => $male_helper,
        //     'female_helper' => $female_helper,

        //     'male_ot' => $male_ot,
        //     'female_ot' => $female_ot,
        //     'male_helper_ot' => $male_helper_ot,
        //     'female_helper_ot' => $female_helper_ot,

        //     'created_by' => $created_by
        // );

        // // print_r($master);die();
        // $Model = new subContractor_m();
        // $Model->save($master);
        // $insertedID = $Model->insertID();

        if ($insertedID) {
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Successful'
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'     => 'Something went wrong.....'
            ));
        }
    }





    public function view_data()
    {

        // $org_id = session()->get('org_id');
        $id  = $this->request->getVar('id');
        $model  = new Attendance_m();
        // $model->where('org_id',$org_id);
        $data = $model->where('id', $id)->first();

        // print_r($data);die();


        if ($data) {
            return json_encode(array(
                'result'    => 1,
                'message'   => $data
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Something went wrong...'
            ));
        }
    }





    /* NEW Think Js */

    public function Create_account()
    {
        return view('create_account');
    }

    public function entry_student_details()
    {
        // print_r('hi');die();

        $name = $this->request->getVar('name');
        $phone = $this->request->getVar('phone');
        $confirm_password = $this->request->getVar('confirm_password');


        $epiData = array(
            'name' => $name,
            'phoneNumber' => $phone,
            'password' => $confirm_password
        );

        // print_r($epiData);die();
        $epiModel = new UsersModel();
        $epiModel->save($epiData);
        $insertedID = $epiModel->insertID();
        if ($insertedID) {
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Successful'
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'     => 'Something went wrong.....'
            ));
        }
    }

    public function OTP_Page()
    {
        return view('OTP-Page');
    }

    public function login_through_otp()
    {

        $otp_tem = $this->request->getVar('otp_tem');


        $model = new UsersModel();
        $model->where('otp', $otp_tem);
        $details7  = $model->get()->getResultArray();
        // print_r($details7);die();
        $epiData = array(
            'verify' => 1
        );

        // print_r($epiData);die();
        $epiModel = new UsersModel();
        $epiModel->set($epiData);
        $epiModel->where('otp', $otp_tem);
        $update = $epiModel->update();



        $sessionData = array(

            'name' => $details7[0]['name'],
            'id' => $details7[0]['id'],
            'role_id' => $details7[0]['role_id'],
            'branch_id' => $details7[0]['branch_id']
        );

        session()->set($sessionData);


        if ($update) {
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Login Success'
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'     => 'Something went wrong.....'
            ));
        }
    }

    public function dashboard_admin()
    {

        $id = session()->get('id');
        // print_r($id);die();

        if ($id) {

            $model = new meeting_m(); 
            $details = $model->get()->getResultArray();           
            $data['meeting'] = $details;

            return view('dashboard_Admin',$data);
        } else {
            // return redirect()->route("/");
            return redirect()->to(base_url());
        }
    }

    public function Employee()
    {
        $id = session()->get('id');

        if ($id) {

            $model = new meeting_m(); 
            $details = $model->get()->getResultArray();           
            $data['meeting'] = $details;

            return view('attendance_v',$data);
        } else {
            // return redirect()->route("/");
            return redirect()->to(base_url());
        }
    }

    public function show_all_attendance_data()
    {

        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
            "port" => $this->db->port
        );

        // print_r($dbDetails);die();

        $table = "userlogin";
        $primaryKey = "id";

        $columns = array(
            array(
                'db' => 'id',
                'dt' => 0,
                'field' => 'id'
            ),
            array(
                'db' => 'name',
                'dt' => 1,
                'field' => 'name'
            ),
            array(
                'db' => 'phoneNumber',
                'dt' => 2,
                'field' => 'phoneNumber'
            ),
            array(
                'db' => 'password',
                'dt' => 3,
                'field' => 'password'
            ),
            array(
                'db' => 'created_at',
                'dt' => 4,
                'field' => 'created_at'
            ),
            array(
                'db' => 'id',
                'dt' => 5,
                'formatter' => function ($d, $row) {
                    return "<div class='btn-group'>                                

                                <button class='btn btn-primary btn-sm' data-id='" . $row['id'] . "' id='updateCountryBtn'>Update</button>
                                <button class='btn btn-danger btn-sm' data-id='" . $row['id'] . "' id='deleteCountryBtn'>Delete</button>
                            </div>";
                }
            ),
        );

        // $joinQuery = "FROM `{$table}` AS `c` LEFT JOIN `upload_files` AS `uf` ON (`uf`.`categories_id` = `c`.`id`)";
        echo json_encode(
            \SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
        );
    }

    public function add_new_attendance()
    {

        $created_by = session()->get('name');

        // print_r($created_by);die();

        $name = $this->request->getVar('name');
        $phone = $this->request->getVar('phone');
        $password = $this->request->getVar('password');

        $newBranch = array(
            'name' => $name,
            'phoneNumber' => $phone,
            'password' => $password,
            'created_by' => $created_by
        );

        // print_r($newBranch);die();
        $Model = new UsersModel();
        $Model->save($newBranch);
        $insertedID = $Model->insertID();

        if ($insertedID) {
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Successful'
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'     => 'Something went wrong.....'
            ));
        }
    }

    public function delete_employee()
    {
        // $org_id = session()->get('org_id');
        $id  = $this->request->getVar('id');

        // print_r($id);die();
        $delete = new UsersModel();
        $delete->where('id', $id);
        // $delete->where('org_id',$org_id);
        $deleteID = $delete->delete();

        if ($deleteID) {
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Deleted Successfully'
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Error'
            ));
        }
    }

    public function update_employee_data()
    {
        // $org_id = session()->get('org_id');
        $id  = $this->request->getVar('id');
        $model  = new UsersModel();
        $data = $model->where('id', $id)->first();

        // print_r($data);die();


        if ($data) {
            return json_encode(array(
                'result'    => 1,
                'message'   => $data
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Something went wrong...'
            ));
        }
    }

    public function update_employee_data_list()
    {
        $id = session()->get('id');
        $name = session()->get('name');


        if ($id) {

            $get_id = $this->request->getVar('get_id');
            $name_u = $this->request->getVar('name_u');
            $phone_u = $this->request->getVar('phone_u');
            $password_u = $this->request->getVar('password_u');

            date_default_timezone_set('Asia/Kolkata');
            $updated_at = date('d-m-Y H:i:s', time());

            $newData = array(
                'name' => $name_u,
                'phoneNumber' => $phone_u,
                'password' => $password_u,

                'updated_by' => $name,
                'updated_at' => $updated_at
            );

            $model = new UsersModel();
            $model->set($newData);
            $model->where('id', $get_id);
            $update1 = $model->update();

            if ($update1) {
                return json_encode(array(
                    'result'    => 1,
                    'message'   => 'Updated successfully....'
                ));
            } else {
                return json_encode(array(
                    'result'    => 0,
                    'message'     => 'Something went wrong.....'
                ));
            }
        } else {
            // return redirect()->route("/");
            return redirect()->to(base_url());
        }
    }

    public function Meeting()
    {
        $id = session()->get('id');

        if ($id) {

            $model = new meeting_m(); 
            $details = $model->get()->getResultArray();           
            $data['meeting'] = $details;

            return view('meeting_v',$data);
        } else {
            // return redirect()->route("/");
            return redirect()->to(base_url());
        }
    }

    public function show_all_meeting_data()
    {

        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
            "port" => $this->db->port
        );

        // print_r($dbDetails);die();

        $table = "meeting";
        $primaryKey = "id";

        $columns = array(
            array(
                'db' => 'id',
                'dt' => 0,
                'field' => 'id'
            ),
            array(
                'db' => 'name',
                'dt' => 1,
                'field' => 'name'
            ),
            array(
                'db' => 'link',
                'dt' => 2,
                'formatter' => function ($d, $row) {
                    return "<div class='btn-group'>                                


                                <a class='btn btn-link btn-sm' href='" . $row['link'] . "' target='_blank'>G-Meeting</a>
                                
                            </div>";
                }
            ),
            array(
                'db' => 'Reason',
                'dt' => 3,
                'field' => 'Reason'
            ),
            array(
                'db' => 'created_at',
                'dt' => 4,
                'field' => 'created_at'
            ),
            array(
                'db' => 'id',
                'dt' => 5,
                'formatter' => function ($d, $row) {
                    return "<div class='btn-group'>                                

                                <button class='btn btn-primary btn-sm' data-id='" . $row['id'] . "' id='updateCountryBtn'>Update</button>
                                <button class='btn btn-danger btn-sm' data-id='" . $row['id'] . "' id='deleteCountryBtn'>Delete</button>
                            </div>";
                }
            ),
        );

        // $joinQuery = "FROM `{$table}` AS `c` LEFT JOIN `upload_files` AS `uf` ON (`uf`.`categories_id` = `c`.`id`)";
        echo json_encode(
            \SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
        );
    }

    public function add_new_meeting()
    {

        $created_by = session()->get('name');

        // print_r($created_by);die();

        $name = $this->request->getVar('name');
        $link = $this->request->getVar('link');
        $reason = $this->request->getVar('reason');

        $newBranch = array(
            'name' => $name,
            'link' => $link,
            'Reason' => $reason,
            'created_by' => $created_by
        );

        // print_r($newBranch);die();
        $Model = new meeting_m();
        $Model->save($newBranch);
        $insertedID = $Model->insertID();

        if ($insertedID) {
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Successful'
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'     => 'Something went wrong.....'
            ));
        }
    }

    public function delete_meeting()
    {
        // $org_id = session()->get('org_id');
        $id  = $this->request->getVar('id');

        // print_r($id);die();
        $delete = new meeting_m();
        $delete->where('id', $id);
        // $delete->where('org_id',$org_id);
        $deleteID = $delete->delete();

        if ($deleteID) {
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Deleted Successfully'
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Error'
            ));
        }
    }

    public function update_meeting_data()
    {
        // $org_id = session()->get('org_id');
        $id  = $this->request->getVar('id');
        $model  = new meeting_m();
        $data = $model->where('id', $id)->first();

        // print_r($data);die();


        if ($data) {
            return json_encode(array(
                'result'    => 1,
                'message'   => $data
            ));
        } else {
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Something went wrong...'
            ));
        }
    }

    public function update_meeting_data_list()
    {
        $id = session()->get('id');
        $name = session()->get('name');


        if ($id) {

            $get_id = $this->request->getVar('get_id');
            $name_u = $this->request->getVar('name_u');
            $link_u = $this->request->getVar('link_u');
            $reason_u = $this->request->getVar('reason_u');

            date_default_timezone_set('Asia/Kolkata');
            $updated_at = date('d-m-Y H:i:s', time());

            $newData = array(
                'name' => $name_u,
                'link' => $link_u,
                'Reason' => $reason_u,

                'updated_by' => $name,
                'updated_at' => $updated_at
            );

            $model = new meeting_m();
            $model->set($newData);
            $model->where('id', $get_id);
            $update1 = $model->update();

            if ($update1) {
                return json_encode(array(
                    'result'    => 1,
                    'message'   => 'Updated successfully....'
                ));
            } else {
                return json_encode(array(
                    'result'    => 0,
                    'message'     => 'Something went wrong.....'
                ));
            }
        } else {
            // return redirect()->route("/");
            return redirect()->to(base_url());
        }
    }
}
