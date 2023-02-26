<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Author extends Model
{
    use HasFactory;
    protected $table = 'authors';
    protected $primaryKey = 'id';
    protected $hidden = ['pivot'];

    protected $fillable = [

        'name',
        'slug',
        'image_id',
        'gender',
        'yob',
        'yod',
        'country',
        'status',
    ];

    public function image() :BelongsTo
    {
        return $this->belongsTo(Image::class);
    }
}
