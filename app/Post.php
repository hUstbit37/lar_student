<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='posts';
    protected $fillable=['title', 'post_content'];
    public function comment(){
        return $this->hasMany('App\Comment', 'post_id', 'id');
    }
}