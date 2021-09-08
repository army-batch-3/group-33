<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assets extends Model
{
    use HasFactory;
    protected $table="pa_assets";
    public $timestamps  = false; //prevent/enable Eloquent to always find column update_at column even when its not present
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
