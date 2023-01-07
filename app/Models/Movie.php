<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $table = 'movies';
    protected $primaryKey = 'id';
    protected $fillable = [

        'title',
        'image',
        'link',
        'year',
        'time',
        'country',
        'slug',
        'status',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'movie_tag','movie_id','tag_id');
    }
}
