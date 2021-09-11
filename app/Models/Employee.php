<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table="pa_employees";
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'photo',
        'employee_type',
    ];
}
