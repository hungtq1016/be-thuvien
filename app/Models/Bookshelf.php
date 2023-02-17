<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookshelf extends Model
{
    use HasFactory;
    protected $table = 'bookshelves';
    protected $primaryKey = 'id';
    protected $fillable = [

        'name',
        'status',
    ];
}
