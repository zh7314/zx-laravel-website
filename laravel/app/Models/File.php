<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model {

    protected $table = 'file';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public $timestamps = false;

}