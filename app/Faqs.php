<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faqs extends Model
{
    //
    public $table="faqs";


    public function question()
    {
        return $this->hasMany('App\FaqsQuestions','faq_id');
    }

 
}

