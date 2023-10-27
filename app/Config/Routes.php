<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');
// $routes->add('Login','Home');
$routes->add('log-out','Dashboard::Logout');

$routes->post('change-branch','Dashboard::change_branch');
$routes->add('Project','Dashboard::Project_v');
$routes->post('add-new-branch','Dashboard::add_new_branch');

$routes->post('edit-project', 'Dashboard::edit_project_data');
$routes->post('view-data', 'Dashboard::view_data');

$routes->post('assessment-project', 'Dashboard::assessment_project');

$routes->post('delete-project', 'Dashboard::delete_project');
$routes->post('add-new-user','Dashboard::add_new_user');
$routes->post('edit-user', 'Dashboard::edit_user');
$routes->post('delete-user', 'Dashboard::delete_user');
$routes->post('project-assessment-add', 'Dashboard::project_assessment_add');

$routes->add('project-work-plan','Dashboard::project_work_plan');

$routes->add('indent','Dashboard::Indent');

$routes->add('master','Dashboard::Master');

$routes->add('sub-master','Dashboard::sub_master');
$routes->add('contractor-creation','Dashboard::contractor_creation');



$routes->get('show-all-sub-master-data','Dashboard::show_all_sub_master_data'); 

$routes->post('sub-master-add', 'Dashboard::sub_master_add');


$routes->add('users','Dashboard::users_v');


$routes->get('show-all-student-data','Dashboard::show_all_student_data'); 

$routes->add('branch-page','Dashboard::branch_page');

$routes->get('show-all-branch-data','Dashboard::show_all_branch_data'); 




$routes->get('show-all-master-data','Dashboard::show_all_master_data'); 
$routes->get('show-all-contractor-data','Dashboard::show_all_contractor_data'); 
$routes->post('add-contractor-data', 'Dashboard::add_contractor_data');
$routes->post('update-contractor-data', 'Dashboard::update_contractor_data');
$routes->post('delete-contractor', 'Dashboard::delete_contractor');


$routes->add('sub-contractor','Dashboard::sub_contractor');
$routes->get('show-all-sub-contractor-data','Dashboard::show_all_sub_contractor_data'); 
$routes->post('sub-contractor-add', 'Dashboard::sub_contractor_add');



$routes->post('add-master-data', 'Dashboard::add_master_data');
$routes->post('update-master-data', 'Dashboard::update_master_data');
$routes->post('delete-master', 'Dashboard::delete_master');



$routes->get('show-all-project-work-plan-data','Dashboard::show_all_project_work_plan_data'); 
$routes->post('project-work-plan-add', 'Dashboard::project_work_plan_add');



$routes->post('find-sub-contractor','Dashboard::find_sub_contractor');

// $routes->add('Dashboard-details','Dashboard::dashboard_details');

$routes->add('student-page','Dashboard::student_page');

$routes->add('Student-Details','Dashboard::student_details');




$routes->post('get-data-branch','Dashboard::get_data_branch');
$routes->post('update-branch','Dashboard::update_branch');

$routes->add('log-out','Logout::logout');
$routes->add('employee-page','Dashboard::employee_page');




/* NEW Think js */

$routes->post('login-condition','Login');
$routes->add('Create-account','Dashboard::Create_account');
$routes->post('entry-student-details','Dashboard::entry_student_details');
$routes->add('OTP-Page','Dashboard::OTP_Page');


$routes->add('Dashboard-Admin','Dashboard::dashboard_admin'); 
$routes->post('login-through-otp','Dashboard::login_through_otp');
$routes->add('employee','Dashboard::Employee');
$routes->get('show-all-attendance-data','Dashboard::show_all_attendance_data'); 
$routes->post('add-new-attendance','Dashboard::add_new_attendance');
$routes->post('delete-employee', 'Dashboard::delete_employee');
$routes->post('update-employee-data', 'Dashboard::update_employee_data');
$routes->post('update-employee-data-list', 'Dashboard::update_employee_data_list');

$routes->add('meeting','Dashboard::Meeting');
$routes->get('show-all-meeting-data','Dashboard::show_all_meeting_data'); 
$routes->post('add-new-meeting','Dashboard::add_new_meeting');
$routes->post('delete-meeting', 'Dashboard::delete_meeting');
$routes->post('update-meeting-data', 'Dashboard::update_meeting_data');
$routes->post('update-meeting-data-list', 'Dashboard::update_meeting_data_list');




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
