<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LoanDetail extends Model
{
    use HasFactory;
    protected $table = 'loans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'money',
        'status'
    ];

    public function loan(): HasMany
    {
        return $this->hasMany(Loan::class);
    }
}
