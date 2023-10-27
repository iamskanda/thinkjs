<?php namespace App\Models;

use CodeIgniter\Model;

class contractor_m extends Model
{
protected $table ='contractor_creation';
protected $allowedFields = ['id','name','created_at','created_by','updated_at','updated_by'];
}
