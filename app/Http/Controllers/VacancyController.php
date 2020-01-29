<?php

namespace App\Http\Controllers;

use App\VacancyCategory;
use App\VacancyPost;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index()
    {
        $vacancy_posts = VacancyPost::with('user', 'vacancy_category')->orderBy('id', 'desc')->get();
        return response()->json([
            'vacancy_posts' => $vacancy_posts,
        ], 200);
    }

    public function get_post_by_id($id)
    {
        $vacancy_post = VacancyPost::with('user', 'vacancy_category')->where('id', $id)->get()->first();
        return response()->json([
            'vacancy_post' => $vacancy_post,
        ], 200);
    }

    public function get_side_categories()
    {
        $vacancy_categories = VacancyCategory::with('vacancy_posts')->orderBy('cat_name')->get();
        return response()->json([
            'vacancy_categories' => $vacancy_categories,
        ], 200);
    }

    public function get_category_posts($id)
    {
        $vacancy_posts = VacancyPost::with('user', 'vacancy_category')->where('cat_id', $id)->orderBy('id', 'desc')->get();
        return response()->json([
            'vacancy_posts' => $vacancy_posts,
        ], 200);
    }

    public function search_posts()
    {
        $search = \Request::get('s');

        if ($search != null) {
            $vacancy_posts = VacancyPost::with('user', 'vacancy_category')
                ->where('title', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%")
                ->get();
            return response()->json([
                'vacancy_posts' => $vacancy_posts,
            ], 200);
        } else {
            return $this->index();
        }
    }

    public function latest_posts() {
        $vacancy_posts = VacancyPost::with('user', 'vacancy_category')->orderBy('id', 'desc')->take(5)->get();

        return response()->json([
            'vacancy_posts' => $vacancy_posts,
        ], 200);
    }
}