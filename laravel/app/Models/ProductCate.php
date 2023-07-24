<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCate extends Model {

    protected $table = 'product_cate';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public $timestamps = false;

}