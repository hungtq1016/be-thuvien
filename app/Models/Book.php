<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $hidden = ['pivot'];
    protected $fillable = [
        'title',
        'slug',
        'desc',
        'year',
        'country',
        'image',
        'language_id',
        'major_id',
        'publisher_id',
        'bookself_id',
        'series_id',
        'status',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class,'book_author');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
