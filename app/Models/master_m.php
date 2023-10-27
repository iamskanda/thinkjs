<?php namespace App\Models;

use CodeIgniter\Model;

class master_m extends Model
{
protected $table ='master';
protected $allowedFields = ['id','master_name','created_at','created_by','updated_at','updated_by'];
}
