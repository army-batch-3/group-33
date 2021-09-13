<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitionItems extends Model
{
    use HasFactory;
    protected $table="pa_requisition_items";
    protected $fillable = [
        "quantity",
        "supplier_id",
        "warehouse_id",
        "transportations_id",
        "assets_id",
        "status",
    ];

}
