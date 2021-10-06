<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid', 'name', 'phone_number', 'address', 'zip',
        'toping', 'quantity', 'payment', 'transaction_total', 'transaction_status'
    ];

    protected $hidden = [];

    // one detail transaction has many transaction
    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'transaction_detailID');
    }
}
