<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'address',
        'rent_price',
        'bedrooms',
        'bathrooms',
        'image',
        'is_available',
    ];

    // এই প্রপার্টিটি কোন ইউজারের (মালিক)
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

