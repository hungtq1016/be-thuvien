<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Loan extends Model
{
    use HasFactory;
    protected $table = 'user_loan';
    protected $primaryKey = 'id';
    protected $hidden = ['created_at','updated_at','pivot'];
    protected $fillable = [
        'expired_time',
    ];

    public function book(): HasOne
    {
        return $this->hasOne(Book::class,'id','book_id');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function detail(): HasOne
    {
        return $this->hasOne(LoanDetail::class,'id','loan_id');
    }
}
