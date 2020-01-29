<?php

namespace App\Http\Controllers;

use App\VacancyPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class VacancyPostController extends Controller
{
    public function index()
    {
        if (Auth::user()->roles()->first()->name == 'Admin') {
            $vacancy_posts = VacancyPost::with('user', 'vacancy_category')->orderBy('id', 'desc')->get();
        } else {
            $user_id = Auth::user()->id;
            $vacancy_posts = VacancyPost::where('user_id', $user_id)->with('vacancy_category')->orderBy('id', 'desc')->get();
        }

        return response()->json([
            'vacancy_posts' => $vacancy_posts,
        ], 200);
    }

    public function add_post(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:2|max:50',
            'description' => 'required|min:2'
        ]);

        if ($request->photo) {
            $strpos = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $strpos);
            $ex = explode('/', $sub)[1];
            $name = time() . "." . $ex;
            $img = Image::make($request->photo)->resize(200, 200);
            $upload_path = public_path() . "/images/post_images/vacancy/";
        }

        $vacancy_post = new VacancyPost();

        $vacancy_post->user_id = Auth::user()->id;
        $vacancy_post->cat_id = $request->cat_id;
        $vacancy_post->title = $request->title;
        $vacancy_post->description = $request->description;
        if ($request->photo) {
            $vacancy_post->photo = $name;
        }
        $vacancy_post->save();

        if ($request->photo) {
            $img->save($upload_path . $name);
        }
    }

    public function edit_post($id)
    {
        $vacancy_post = VacancyPost::find($id);

        return response()->json([
            'vacancy_post' => $vacancy_post,
        ], 200);
    }

    public function update_post(Request $request, $id)
    {

        $vacancy_post = VacancyPost::find($id);
        $this->validate($request, [
            'title' => 'required|min:2|max:50',
            'description' => 'required|min:2|max:1000'
        ]);

        if ($request->photo) {
            $strpos = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $strpos);
            $ex = explode('/', $sub)[1];
            $name = time() . "." . $ex;
            $img = Image::make($request->photo)->resize(200, 200);
            $upload_path = public_path() . "/images/post_images/vacancy/";
            $image = $upload_path . $vacancy_post->photo;
            $img->save($upload_path . $name);

            if (file_exists($image)) {
                @unlink($image);
            }
        }

        $vacancy_post->user_id = Auth::user()->id;
        $vacancy_post->cat_id = $request->cat_id;
        $vacancy_post->title = $request->title;
        $vacancy_post->description = $request->description;
        if ($request->photo) {
            $vacancy_post->photo = $name;
        }
        $vacancy_post->save();
    }

    public function delete_post($id)
    {
        $vacancy_post = VacancyPost::find($id);
        $image_path = public_path() . "/images/post_images/vacancy/";
        $image = $image_path . $vacancy_post->photo;
        if (file_exists($image)) {
            @unlink($image);
        }
        $vacancy_post->delete();
    }
}
