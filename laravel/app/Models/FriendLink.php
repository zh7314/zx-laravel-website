<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FriendLink extends Model {

    protected $table = 'friend_link';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public $timestamps = false;

}