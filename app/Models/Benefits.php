<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefits extends Model
{
    use HasFactory;

    protected $table = 'pa_benefits';
    public $timestamps  = false; //prevent/enable Eloquent to always find column update_at column even when its not present
    protected $fillable = [
        'id',
        'sss',
        'philhealth',
        'pagibig',
        'savings',
        'tin',
    ];
}
