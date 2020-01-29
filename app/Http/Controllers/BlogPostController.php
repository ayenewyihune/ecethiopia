<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPost;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class BlogPostController extends Controller
{
    public function index() {
        if (Auth::user()->roles()->first()->name == 'Admin') {
            $blog_posts = BlogPost::with('user','blog_category')->orderBy('id','desc')->get();
        } else {
            $user_id = Auth::user()->id;
            $blog_posts = BlogPost::where('user_id',$user_id)->with('blog_category')->orderBy('id','desc')->get();
        }
        return response()->json([
            'blog_posts' => $blog_posts
        ], 200);
    }

    public function add_post(Request $request) {
        $this->validate($request, [
            'title' => 'required|min:2|max:50',
            'description' => 'required|min:2'
        ]);

        if ($request->photo) {
            $strpos = strpos($request->photo,';');
            $sub = substr($request->photo,0,$strpos);
            $ex = explode('/',$sub)[1];
            $name = time().".".$ex;
            $img = Image::make($request->photo)->resize(200, 200);
            $upload_path = public_path()."/images/post_images/blog/";
        }

        $blog_post = new BlogPost();

        $blog_post->user_id = Auth::user()->id;
        $blog_post->cat_id = $request->cat_id;
        $blog_post->title = $request->title;
        $blog_post->description = $request->description;
        if ($request->photo) {
            $blog_post->photo = $name;
        }
        $blog_post->save();

        if ($request->photo) {
            $img->save($upload_path.$name);
        }
    }

    public function edit_post($id) {
        $blog_post = BlogPost::find($id);

        return response()->json([
            'blog_post' => $blog_post
        ], 200);
    }

    public function update_post(Request $request, $id) {

        $blog_post = BlogPost::find($id);
        $this->validate($request, [
            'title' => 'required|min:2|max:50',
            'description' => 'required|min:2|max:1000'
        ]);

        if ($request->photo) {
            if ($request->photo != $blog_post->photo) {
                $strpos = strpos($request->photo, ';');
                $sub = substr($request->photo, 0, $strpos);
                $ex = explode('/',$sub)[1];
                $name = time().".".$ex;
                $img = Image::make($request->photo)->resize(200,200);
                $upload_path = public_path()."/images/post_images/blog/";
                $image = $upload_path.$blog_post->photo;
                $img->save($upload_path.$name);
    
                if (file_exists($image)) {
                    @unlink($image);
                }
            }
        }

        $blog_post->user_id = Auth::user()->id;
        $blog_post->cat_id = $request->cat_id;
        $blog_post->title = $request->title;
        $blog_post->description = $request->description;
        if ($request->photo) {
            $blog_post->photo = $name;
        }
        $blog_post->save();
    }

    public function delete_post($id) {
        $blog_post = BlogPost::find($id);
        $image_path = public_path()."/images/post_images/blog/";
        $image = $image_path.$blog_post->photo;
        if (file_exists($image)) {
            @unlink($image);
        }
        $blog_post->delete();
    }
}
