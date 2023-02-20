<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $hidden = ['pivot'];

    protected $fillable = [
        'name',
        'desc',
        'image',
        'slug',
        'status',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
