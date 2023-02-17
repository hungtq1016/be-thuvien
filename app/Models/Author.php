<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $table = 'authors';
    protected $primaryKey = 'id';
    protected $hidden = ['pivot'];

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
