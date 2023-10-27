<?php namespace App\Models;

use CodeIgniter\Model;

class branchDetails_m extends Model
{
protected $table ='branchdetails';
protected $allowedFields = ['id','name','image','email','address','phonenumber','contactperson','gender','created_at','created_by','updated_at','updated_by'];
}
