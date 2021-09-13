<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    use HasFactory;
    protected $table="pa_requisition";
    protected $fillable = [
        'transportation_id',
        'employee_id',
        'assets_id',
        'quantity',
        'status',
    ];
}

