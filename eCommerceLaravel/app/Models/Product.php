<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //___________________ connect  database table with Model _______________
    // The table associated with the model
    protected $table = 'products';

    // The primary key column name
    protected $primaryKey = 'id';
}
