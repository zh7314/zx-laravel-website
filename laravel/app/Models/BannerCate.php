<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BannerCate extends Model {

    protected $table = 'banner_cate';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public $timestamps = false;

}