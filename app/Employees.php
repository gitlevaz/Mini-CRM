<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = [
        'f_name','l_name','company','email','phone','status'
   ];
}
