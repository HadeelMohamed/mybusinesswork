<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    //
    public $timestamps = false;
   
    public $table="jobtitle";

      protected $fillable = [

         'cat_id'

     ];

        public function job_title_trans()
    {
        return $this->hasMany('App\JobTitleTrans', 'jobtitle_id');
    }

         
   


}