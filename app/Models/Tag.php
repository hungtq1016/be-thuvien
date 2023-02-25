<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags';
    protected $primaryKey = 'id';
    protected $hidden = ['pivot'];

    protected $fillable = [
        'name',
        'desc',
        'image_id',
        'slug',
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
