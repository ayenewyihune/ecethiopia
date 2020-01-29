<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VacancyCategory extends Model
{
    public function vacancy_posts() {
        return $this->hasMany('App\VacancyPost','cat_id');
    }
}
