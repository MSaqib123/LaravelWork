<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    //_______________ Connectiong  Database Table with Model ___________________
    protected $table = "teachers"; //same database  Table Name 
    protected $primaryKey = "id" ;  //same  database Table Name  +  primary ka  K bar ho gaa
}
