<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    protected $table = 'pa_personalinfo';
    public $timestamps  = false; //prevent/enable Eloquent to always find column update_at column even when its not present
    protected $fillable = [
        'id',
        'given_name',
        'middle_name',
        'last_name',
        'email',
        'contact',
        'address',
        'company',
        'job_title',
        'country',
        'city',
        'active',
    ];
}
