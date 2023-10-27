<?php namespace App\Models;

use CodeIgniter\Model;

class subMaster_m extends Model
{
protected $table ='sub_master';
protected $allowedFields = ['id','master_id','master_name','submaster_name','created_at','created_by','updated_at','updated_by'];
}
