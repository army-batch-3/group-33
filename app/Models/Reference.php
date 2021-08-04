<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;
    protected $table="pa_reference";
    public $timestamps  = false;
    protected $fillable = [
        'user_id',
        'name',
        'company',
        'relationship',
        'contact'
    ];
}
