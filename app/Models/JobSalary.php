<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSalary extends Model
{
    use HasFactory;

    protected $table = 'pa_title';
    public $timestamps  = false; //prevent/enable Eloquent to always find column update_at column even when its not present
    protected $fillable = [
        'Title',
        'Description',
        'PayLevel',
        'first_half_month',
        'second_half_month',
        'allowance',
        'Daily_rate',
        'Hourly_rate',
        'Minute_rate',
        'Month_rate',
        'Class',
    ];
}
