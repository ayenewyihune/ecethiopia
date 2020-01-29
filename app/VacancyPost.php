<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VacancyPost extends Model
{
    public function vacancy_category() {
        return $this->belongsTo('App\VacancyCategory', 'cat_id');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
