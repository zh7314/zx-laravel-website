<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DownloadCate extends Model {

    protected $table = 'download_cate';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public $timestamps = false;

}