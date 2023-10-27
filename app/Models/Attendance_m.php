<?php namespace App\Models;

use CodeIgniter\Model;

class Attendance_m extends Model
{
protected $table ='attendance';
protected $allowedFields = ['id','project_name','category_type','contractor_id','contractor_name','mhc','mhhc','fhc','fhhc','ot','mhc_ot','mhhc_ot','fhc_ot','fhhc_ot','issue','created_at','created_by','updated_at','updated_by'];
}
