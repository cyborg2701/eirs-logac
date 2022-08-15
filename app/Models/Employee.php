<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'email', 
        'lastname', 
        'firstname', 
        'middlename', 
        'empnumber', 
        'gsis', 
        'philhealth', 
        'pagibig', 
        'tin', 
        'itemnumber',
        'position', 
        'coordinatorship',
        'subjects', 
        'loads', 
        'advisory',
        'firstdose',
        'seconddose',
        'additional',
        'firstbrand',
        'secondbrand',
        'additionalbrand'
    ];
}
