<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['comment_content', 'post_id'];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}