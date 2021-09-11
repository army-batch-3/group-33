<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assets extends Model
{
    use HasFactory;
    protected $table="pa_assets";
    protected $fillable = [
        'name',
        'photo',
        'number_of_stocks',
        'type',
        'price',
        'supplier_id',
        'warehouse_id',
    ];
}
