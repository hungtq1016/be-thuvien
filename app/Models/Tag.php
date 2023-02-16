<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'slug',
        'status',
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class,'movie_tag','movie_id','tag_id');
    }

    public function books()
    {
        return $this->morphedByMany(Book::class,'book_tag','book_id','tag_id');
    }
}
