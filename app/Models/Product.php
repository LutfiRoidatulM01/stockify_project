<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'id',
        'name',
        'category_id',
        'supplier_id',
        'sku',
        'purchase_price',
        'selling_price',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function stockTransactions()
    {
        return $this->hasMany(StockTransaction::class);
    }

    public function totalStock()
    {
        return $this->stockTransactions()->sum('quantity');
    }
}
