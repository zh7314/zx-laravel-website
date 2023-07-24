<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model {

    protected $table = 'config';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public $timestamps = false;

}