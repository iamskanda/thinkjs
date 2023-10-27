<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
protected $table ='project_work_plane';
protected $allowedFields = ['id','project_id','name','start_date','end_date','length','breadth','height','units','total','note','created_at','created_by','updated_at','updated_by'];
}
