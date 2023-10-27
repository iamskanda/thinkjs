<?php namespace App\Models;

use CodeIgniter\Model;

class meeting_m extends Model
{
protected $table ='meeting';
protected $allowedFields = ['id','name','link','Reason','created_at','created_by','updated_at','updated_by'];
}
