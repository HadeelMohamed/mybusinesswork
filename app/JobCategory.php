<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    //
    public $timestamps = false;
   
    public $table="job_categories";

        public function job_categorytrans()
    {
        return $this->hasMany('App\JobCategoryTrans', 'cat_job_id');
    }

         public function job_titletrans()
    {
        return $this->hasMany('App\JobTitleTrans', 'cat_id');
    }


}