<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        //'category_name',
        'description',
        'photo',
        "price",
        "location",
        "user_id",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
