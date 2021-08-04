<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    use HasFactory;
    protected $table="pa_suppliers";
    public $timestamps  = false;
    protected $fillable = [
        'name',
        'email',
        'contact_number',
        'contact_person',
        'address'
    ];
}
