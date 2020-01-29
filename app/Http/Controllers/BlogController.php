<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use App\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blog_posts = BlogPost::with('user', 'blog_category')->orderBy('id', 'desc')->get();
        return response()->json([
            'blog_posts' => $blog_posts,
        ], 200);
    }

    public function get_post_by_id($id)
    {
        $blog_post = BlogPost::with('user', 'blog_category')->where('id', $id)->get()->first();
        return response()->json([
            'blog_post' => $blog_post,
        ], 200);
    }

    public function get_side_categories()
    {
        $blog_categories = BlogCategory::with('blog_posts')->orderBy('cat_name')->get();
        return response()->json([
            'blog_categories' => $blog_categories,
        ], 200);
    }

    public function get_category_posts($id)
    {
        $blog_posts = BlogPost::with('user', 'blog_category')->where('cat_id', $id)->orderBy('id', 'desc')->get();
        return response()->json([
            'blog_posts' => $blog_posts,
        ], 200);
    }

    public function search_posts()
    {
        $search = \Request::get('s');

        if ($search != null) {
            $blog_posts = BlogPost::with('user', 'blog_category')
                ->where('title', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%")
                ->get();
            return response()->json([
                'blog_posts' => $blog_posts,
            ], 200);
        } else {
            return $this->index();
        }
    }

    public function latest_posts() {
        $blog_posts = BlogPost::with('user', 'blog_category')->orderBy('id', 'desc')->take(5)->get();

        return response()->json([
            'blog_posts' => $blog_posts,
        ], 200);
    }
}
