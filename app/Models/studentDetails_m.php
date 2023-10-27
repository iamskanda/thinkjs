<?php namespace App\Models;

use CodeIgniter\Model;

class studentDetails_m extends Model
{
	protected $table ='studentdetails';
	protected $allowedFields = ['id','branch_id','image','fname','lname','gender','dob','phone_no','email','address','parent_phone_no','aadhar_card_no','created_at','created_by','updated_at','updated_by']; 
}
