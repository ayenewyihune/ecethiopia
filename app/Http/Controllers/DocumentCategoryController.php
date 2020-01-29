<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProfessionalCategory;

class DocumentCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $professional_categories = ProfessionalCategory::all();

        return response()->json([
            'professional_categories' => $professional_categories,
        ], 200);
    }

    public function add_category(Request $request)
    {
        $this->validate($request, [
            'study_field' => 'required|min:2|max:50',
        ]);

        $professional_category = new ProfessionalCategory();

        $professional_category->study_field = $request->study_field;
        $professional_category->save();
    }

    public function edit_category($id)
    {
        $professional_category = ProfessionalCategory::find($id);

        return response()->json([
            'professional_category' => $professional_category,
        ], 200);
    }

    public function update_category(Request $request, $id)
    {
        $this->validate($request, [
            'study_field' => 'required|min:2|max:50',
        ]);

        $professional_category = ProfessionalCategory::find($id);

        $professional_category->study_field = $request->study_field;
        $professional_category->save();
    }

    public function delete_category($id)
    {
        $professional_category = ProfessionalCategory::find($id);
        $professional_category->delete();
    }

    public function delete_categories($ids)
    {
        $all_ids = explode(',', $ids);
        foreach ($all_ids as $id) {
            $professional_category = ProfessionalCategory::find($id);
            $professional_category->delete();
        }
    }
}
