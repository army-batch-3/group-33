<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    use HasFactory;
    protected $table="pa_transportations";
    protected $fillable = [
        'type',
        'plate_number',
        'is_available',
        'created_at',
        'updated_at'
    ];
}
