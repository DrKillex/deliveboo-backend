<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $guarded=['slug', 'img'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    public function products()
    {
        return $this->hasMany(Product::class);
    }
    // protected function img(): Attribute {
    //     return Attribute::make(
    //         get: fn(string|null $value) => $value !== null ? asset('storage/' . $value) : null,
    //     );
    // }
}
