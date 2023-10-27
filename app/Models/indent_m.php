<?php namespace App\Models;

use CodeIgniter\Model;

class indent_m extends Model
{
protected $table ='indent';
protected $allowedFields = ['id','project_name','employe_name','contact_person','phone','date','note','item','quantity','created_at','created_by','updated_at','updated_by'];
}
