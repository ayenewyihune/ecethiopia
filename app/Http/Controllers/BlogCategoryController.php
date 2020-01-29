<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $blog_categories = BlogCategory::all();

        return response()->json([
            'blog_categories' => $blog_categories,
        ], 200);
    }

    public function add_category(Request $request)
    {
        $this->validate($request, [
            'cat_name' => 'required|min:2|max:50',
        ]);

        $blog_category = new BlogCategory();

        $blog_category->cat_name = $request->cat_name;
        $blog_category->save();
    }

    public function edit_category($id)
    {
        $blog_category = BlogCategory::find($id);

        return response()->json([
            'blog_category' => $blog_category,
        ], 200);
    }

    public function update_category(Request $request, $id)
    {
        $this->validate($request, [
            'cat_name' => 'required|min:2|max:50',
        ]);

        $blog_category = BlogCategory::find($id);

        $blog_category->cat_name = $request->cat_name;
        $blog_category->save();
    }

    public function delete_category($id)
    {
        $blog_category = BlogCategory::find($id);
        $blog_category->delete();
    }

    public function delete_categories($ids)
    {
        $all_ids = explode(',', $ids);
        foreach ($all_ids as $id) {
            $blog_category = BlogCategory::find($id);
            $blog_category->delete();
        }
    }
}
