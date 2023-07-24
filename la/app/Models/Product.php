<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public $timestamps = false;

    public function getContentAttribute($value)
    {
        return !empty($value) ? htmlspecialchars_decode($value) : '';
    }

    public function product_cate()
    {
        return $this->hasOne(\App\Models\ProductCate::class, 'id', 'product_cate_id');
    }
}
