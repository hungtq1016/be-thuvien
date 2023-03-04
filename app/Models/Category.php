<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'slug',
        'image_id',
        'isShow',
        'status',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    public function image() :BelongsTo
    {
        return $this->belongsTo(Image::class);
    }
}
