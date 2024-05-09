<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale_detail extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'sale_details';
    protected $fillable = [
        'quantity',
        'unit_price',
        'subtotal',
        'sale_id',
        'product_id',
        'status'
    ];

    protected $guarded = ['id','status','registered_by','created_at','updated_at'];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
