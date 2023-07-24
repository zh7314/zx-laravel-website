<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{

    protected $table = 'news';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public $timestamps = false;

    public function news_cate()
    {
        return $this->hasOne(\App\Models\NewsCate::class, 'id', 'news_cate_id');
    }

    public function getContentAttribute($value)
    {
        return !empty($value) ? htmlspecialchars_decode($value) : '';
    }
}
