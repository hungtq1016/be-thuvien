<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags';
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
