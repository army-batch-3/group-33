<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;
    protected $table="pa_title";
    public $timestamps  = false;
    protected $fillable = [
        'Title',
        'Description',
    ];
}
