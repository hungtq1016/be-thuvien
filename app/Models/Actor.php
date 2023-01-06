<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    protected $table = 'actors';
    protected $primaryKey = 'id';
    protected $fillable = [

        'name',
        'image',
        'gender',
        'yob',
        'yod',
        'country',
        'slug',
        'status',
    ];
}
