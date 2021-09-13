<?php

namespace App\Models;

use App\Models\Suppliers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'created_at',
        'updated_at'
    ];

    public function supplier()
    {
        return $this->belongsTo(Suppliers::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
