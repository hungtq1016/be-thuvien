<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'year',
        'country',
        'image',
        'language_id',
        'major_id',
        'publisher_id',
        'bookself_id',
        'series_id',
        'status',
    ];

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

    public function bookself()
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

    public function users() :BelongsToMany
    {
        return $this->belongsToMany(User::class,'user_loan','book_id','user_id');
    }

    public function loans() :BelongsToMany
    {
        return $this->belongsToMany(Loan::class,'user_loan','book_id','loan_id');
    }

    public function children()
    {
        return $this->hasMany(self::class,'id','series_id');
    }
    public function parent(){
        return $this->hasOne( self::class, 'series_id', 'id' );
    }
}
