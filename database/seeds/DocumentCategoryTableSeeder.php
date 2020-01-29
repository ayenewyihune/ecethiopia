<?php

use Illuminate\Database\Seeder;
use App\ProfessionalCategory;

class ProfessionalCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new ProfessionalCategory();
        $category->study_field = 'Architecture';
        $category->save();
        
        $category = new ProfessionalCategory();
        $category->study_field = 'Civil Engineering';
        $category->save();

        $category = new ProfessionalCategory();
        $category->study_field = 'Electrical Engineering';
        $category->save();

        $category = new ProfessionalCategory();
        $category->study_field = 'Mechanical Engineering';
        $category->save();
    }
}
