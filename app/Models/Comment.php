<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $primaryKey = 'id';
    protected $fillable = [
        'comment',
        'user_id',
        'book_id',
        'rate',
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function book() :BelongsToMany
    {
        return $this->belongsToMany(Book::class);
    }
}
