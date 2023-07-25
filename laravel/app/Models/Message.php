<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $table = 'message';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public $timestamps = false;

}
