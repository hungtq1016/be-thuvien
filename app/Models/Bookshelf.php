<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookshelf extends Model
{
    use HasFactory;
    protected $table = 'bookshelves';
    protected $primaryKey = 'id';
    // protected $hidden = ['created_at','updated_at'];
    protected $fillable = [
        'name',
        'status',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
