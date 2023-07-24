<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model {

    protected $table = 'seo';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public $timestamps = false;

}