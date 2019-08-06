<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memberlang extends Model
{
    //
    public $timestamps = false;

    public $table="member_lang";

 protected $fillable = [

         'lang_id', 'member_id','name'

     ];

    public function language()
    {
        return $this->hasMany('App\language', 'lang_id');
    }

 
}