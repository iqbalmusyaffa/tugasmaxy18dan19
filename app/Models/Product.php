<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PurchaseOrderLine;
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_code',
        'price',
    ];
    public function purchaseOrderLines()
    {
        return $this->hasMany(PurchaseOrderLine::class);
    }

}
