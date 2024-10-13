<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'stock_amount',
        'storage_id',
        'owner_id'
    ];

    public function storage()
    {
        // i though this was correct. it isn't
        // return $this->hasOne(Storage::class);
        return $this->belongsTo(Storage::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
