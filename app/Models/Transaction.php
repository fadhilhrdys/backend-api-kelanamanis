<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['transaction_detailID', 'menuID'];

    protected $hidden = [];

    // one transaction has one detail transaction
    public function details()
    {
        return $this->belongsTo(TransactionDetail::class, 'transaction_detailID', 'id');
    }

    // one transaction has many menu
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menuID', 'id');
    }
}
