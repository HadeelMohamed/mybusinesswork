<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nationtrans extends Model
{
    //
    public $timestamps = false;

     protected $fillable = [

         'name','lang_id','nationality_id','active'

     ];
   
    public $table="nationalities_tran";

    


}