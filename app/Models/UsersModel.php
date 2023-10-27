<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
protected $table ='userlogin';
protected $allowedFields = ['id','role_id','branch_id','project_assessment','name','image','email','dob','address','phoneNumber','password','otp','verify','created_at','created_by','updated_at','updated_by'];
}
