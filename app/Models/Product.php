<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'tblproduct';
    protected $primaryKey = 'product_id';
    public $timestamps = false;
    protected $fillable = [
        'category_id',
        'product_title',
        'product_description',
        'product_price',
        'product_quantity',
        'product_image',
        'product_discount',
        'product_author',
        'create_date',
    ];
}
