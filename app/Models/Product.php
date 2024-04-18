<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'purchase_price',
        'description',
        'stock_quantity',
        'expiration_date',

        
    ];

    protected $guarded = ['id','created_at','updated_at'];

   

    public function sale_details()
    {
        return $this->hasMany(Order::class);
    }
}