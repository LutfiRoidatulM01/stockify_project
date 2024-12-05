<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';

    protected $fillable = [
        'id',
        'name',
        'address',
        'phone',
        'email',
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
