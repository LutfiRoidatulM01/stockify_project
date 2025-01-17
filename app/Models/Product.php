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
        'image',
        'minimum_stock',
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

    public function getStokMasukAttribute()
    {
        return $this->stockTransactions()
            ->where('type', 'Masuk')
            ->where('status', 'Diterima')
            ->sum('quantity');
    }

    public function getStokKeluarAttribute()
    {
        return $this->stockTransactions()
            ->where('type', 'Keluar')
            ->where('status', 'Dikeluarkan')
            ->sum('quantity');
    }

    public function totalStock()
    {
        $incomingStock = $this->stokMasuk;
        $outgoingStock = $this->stokKeluar;
        return $incomingStock - $outgoingStock; 
    }

}
