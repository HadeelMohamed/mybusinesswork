<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobTitleTrans extends Model
{
    //
    public $timestamps = false;

      protected $fillable = [

         'name','lang_id','jobtitle_id','active','cat_id'

     ];
   
    public $table="jobtitle_trans";



}