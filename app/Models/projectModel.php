<?php namespace App\Models;

use CodeIgniter\Model;

class projectModel extends Model
{
protected $table ='projectdetails';
protected $allowedFields = ['id','role_id','name','location','facing','builduparea','landdimension','startdate','note','uploadfile','created_at','created_by','updated_at','updated_by'];
}
