<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    use HasFactory;
    protected $table="pa_personalinfo";
    public $timestamps  = false;
    protected $fillable = [
	    'email',
	    'given_name',
	    'middle_name',
	    'last_name',
	    'company',
	    'job_title',
	    'contact',
	    'country',
	    'city',
	    'address',
	    'active'
    ];
}
