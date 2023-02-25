<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Publisher extends Model
{
    use HasFactory;
    protected $table = 'publishers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'slug',
        'image_id',
        'desc',
        'status',
    ];
    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function image() :BelongsTo
    {
        return $this->belongsTo(Image::class);
    }
}
