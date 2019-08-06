<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    //
    public $timestamps = false;
   
    public $table="nationalities";

        public function nationtrans()
    {
        return $this->hasMany('App\Nationtrans', 'nationality_id');
    }


}