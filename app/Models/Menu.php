<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Menu extends Model
{
    use HasFactory, SoftDeletes;

    // field mana aja yang bisa diisi secara massal
    protected $fillable = ['name', 'categories', 'slug', 'price', 'photo'];

    protected $hidden = [];

    // one menu has many transaction
    public function transactions()
    {
        return $this->hasMany(transactionDetail::class, 'menuID');
    }

    // function utk menambahkan url jika diakses
    public function getPhotoAttribute($value)
    {
        return url('storage/' . $value);
    }
}
