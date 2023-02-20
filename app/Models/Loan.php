<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Loan extends Model
{
    use HasFactory;
    protected $table = 'loans';
    protected $primaryKey = 'id';
    protected $hidden = ['created_at','updated_at','pivot'];
    protected $fillable = [
        'name',
        'money',
        'status'
    ];

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class,'user_loan','loan_id','book_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'user_loan');
    }
}
