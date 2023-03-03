<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $hidden = ['pivot'];
    protected $fillable = [
        'name',
        'slug',
        'desc',
        'release',
        'country',
        'quantity',
        'count',
        'image_id',
        'language_id',
        'major_id',
        'publisher_id',
        'bookshelf_id',
        'series_id',
        'status',
    ];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
    public function bookshelf()
    {
        return $this->belongsTo(Bookshelf::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function parent(){

        return $this->belongsTo( self::class, 'id', 'series_id' );
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class,'book_author');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function users() :BelongsToMany
    {
        return $this->belongsToMany(User::class,'user_loan','book_id','user_id');
    }

    public function loans() :BelongsToMany
    {
        return $this->belongsToMany(Loan::class,'user_loan','book_id','loan_id');
    }

    public function comments() :HasMany
    {
        return $this->HasMany(Comment::class);
    }


    public function children()
    {
        return $this->hasMany(self::class,'series_id','id');
    }

}
