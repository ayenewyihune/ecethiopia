<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    public function blog_category() {
        return $this->belongsTo('App\BlogCategory', 'cat_id');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
