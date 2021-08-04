<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    use HasFactory;
    protected $table="pa_employment";
    public $timestamps  = false;
    protected $fillable = [
        'user_id',
        'position',
        'company',
        'reason',
        'date_from',
        'date_to'
    ];
}
