<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Delatbabel\Elocrypt\Elocrypt;
use DB;

class Employee extends Model
{
	
    use Elocrypt;

    protected $table = "employee";
    protected $fillable = [ 'firstname', 'lastname', 'email', 'phone', 'gender', 'address', 'description', 'image', 'created_at', 'updated_at', 'status', 'verify', 'dob', 'account_number' ];

    protected $encrypts = [];
    
    public function user()
	{
   return $this->hasMany('App\User');
	}

	public function get_column()
{
   return array(
        array('data'=>'First Name', 'align' => 'left'), 
        array('data'=>'Last Name', 'align' => 'left'),
        array('data'=>'Gender', 'align' => 'left'),
        array('data'=>'Date of Birth', 'align' => 'left'),
        array('data'=>'Email', 'align' => 'left'),
        array('data'=>'Phone', 'align' => 'left'),        
        array('data'=>'Address', 'align' => 'left'),        
    
       );
}

public function get_summary()
{
   return DB::table($this->table)->select(DB::raw('COUNT(*) as total'))->where('status',1)->first();
}

}

            