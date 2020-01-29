<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    public function blog_posts() {
        return $this->hasMany('App\BlogPost','cat_id');
    }
}
