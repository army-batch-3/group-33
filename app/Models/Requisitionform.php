<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisitionform extends Model
{
    use HasFactory;
    protected $table="pa_requisition_form";
    protected $fillable = [
        'transportation_id',	
        'employee_id',	
        'assets_id',	
        'quantity',	
        'status',
    ];
}
