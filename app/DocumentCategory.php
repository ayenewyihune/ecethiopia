<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfessionalCategory extends Model
{
    public function users() {
        return $this->hasMany('App\User','study_field_id');
    }
}
