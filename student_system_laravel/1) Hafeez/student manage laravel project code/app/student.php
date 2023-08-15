<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    public $fillable = array('sname','fname','class','phnum','email');
}
