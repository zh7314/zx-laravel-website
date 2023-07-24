<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoCate extends Model {

    protected $table = 'video_cate';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public $timestamps = false;

}