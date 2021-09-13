<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $table = "pa_warehouses";
    protected $fillable = [
        'name',
        'floor',
        'building',
        'room',
        'address',
        'section',
        'contact_number',

    ];

}
