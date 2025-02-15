<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'category',
        'sub_category',
        'category_code',        
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
