<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobCategoryTrans extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [

         'name','lang_id','cat_job_id','active'

     ];
    public $table="job_categories_trans";

  

}