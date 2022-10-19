<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'iban',
        'bic',
        'bank',
        'amount',
        'description',
        'password'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
