<?php namespace App\Models;

use CodeIgniter\Model;

class subContractor_m extends Model
{
protected $table ='sub_contractor_creation';
protected $allowedFields = ['id','contractor_id','contractor_type','name','phone','male','male_helper','female','female_helper','male_ot','female_ot','male_helper_ot','female_helper_ot','created_at','created_by','updated_at','updated_by'];
}
