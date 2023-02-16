<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'slug',
        'specialization',
        'publisher',
        'image',
        'language',
        'desc',
        'year',
        'bookself',
        'series',
        'country',
        'status',
    ];

    public function tags()
    {
        return $this->morphedByMany(Tag::class,'book_tag','book_id','tag_id');
    }
}
