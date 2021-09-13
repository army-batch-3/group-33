<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restock extends Model
{
    use HasFactory;
    protected $table="pa_restock";
    protected $fillable = [
        "supplier_id",
        "warehouse_id",
        "transportation_id",
        "assets_id",
        "quantity",
        "status",
    ];
}
