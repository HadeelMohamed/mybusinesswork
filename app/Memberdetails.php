<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memberdetails extends Model
{
    //
    public $timestamps = false;

    public $table="member_details";

 protected $fillable = [

         'user_id','jobtitle_id','gender'

     ];

   
 
}