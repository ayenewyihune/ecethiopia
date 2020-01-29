<?php

namespace App\Http\Controllers;

use App\VacancyCategory;
use Illuminate\Http\Request;

class VacancyCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $vacancy_categories = VacancyCategory::all();

        return response()->json([
            'vacancy_categories' => $vacancy_categories,
        ], 200);
    }

    public function add_category(Request $request)
    {
        $this->validate($request, [
            'cat_name' => 'required|min:2|max:50',
        ]);

        $vacancy_category = new VacancyCategory();

        $vacancy_category->cat_name = $request->cat_name;
        $vacancy_category->save();
    }

    public function edit_category($id)
    {
        $vacancy_category = VacancyCategory::find($id);

        return response()->json([
            'vacancy_category' => $vacancy_category,
        ], 200);
    }

    public function update_category(Request $request, $id)
    {
        $this->validate($request, [
            'cat_name' => 'required|min:2|max:50',
        ]);

        $vacancy_category = VacancyCategory::find($id);

        $vacancy_category->cat_name = $request->cat_name;
        $vacancy_category->save();
    }

    public function delete_category($id)
    {
        $vacancy_category = VacancyCategory::find($id);
        $vacancy_category->delete();
    }

    public function delete_categories($ids)
    {
        $all_ids = explode(',', $ids);
        foreach ($all_ids as $id) {
            $vacancy_category = VacancyCategory::find($id);
            $vacancy_category->delete();
        }
    }
}
