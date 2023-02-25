<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'path',
        'status',
    ];

    public function categories()
    {
        return $this->hasMany(Category::class,'image_id','id');
    }

    public function tags()
    {
        return $this->hasMany(Tag::class,'image_id','id');
    }
}
