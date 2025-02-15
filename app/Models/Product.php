<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;


class Product extends Model
{
    use HasFactory;
    use Billable;


    protected $table = 'products';

    protected $fillable = [
        'name', 'description', 'price', 'order_no', 'currency', 'image', 'production_date',
         'barcode', 'quantity', 'is_active', 'brand_id', 'category_id',  
                      
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
