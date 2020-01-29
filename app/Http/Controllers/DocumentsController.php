<?php

namespace App\Http\Controllers;

use App\ProfessionalCategory;
use App\User;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function index() {
        $professionals = User::whereHas('roles', function($q) {$q->where('name', 'User');})
        ->with('professional_category')->orderBy('name')->get();
        return response()->json([
            'professionals'=>$professionals
        ],200);
    }

    public function get_post_by_id($id)
    {
        $professional = User::where('id',$id)->with('professional_category')->orderBy('name')->get()->first();
        return response()->json([
            'professional' => $professional,
        ], 200);
    }

    public function get_side_categories()
    {
        $professional_categories = ProfessionalCategory::with('users')->orderBy('study_field')->get();
        return response()->json([
            'professional_categories' => $professional_categories,
        ], 200);
    }

    public function get_category_posts($id)
    {
        $professionals = User::whereHas('roles', function($q) {$q->where('name', 'User');})
        ->where('study_field_id', $id)->with('professional_category')->orderBy('name')->get();
        return response()->json([
            'professionals' => $professionals,
        ], 200);
    }

    public function search_professionals()
    {
        $search = \Request::get('s');

        if ($search != null) {
            $professionals = User::where('name', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%")
                ->orWhere('cgpa', 'LIKE', "%$search%")
                ->orWhere('graduation_year', 'LIKE', "%$search%")
                ->with('professional_category')->orderBy('name')
                ->get();
            return response()->json([
                'professionals' => $professionals,
            ], 200);
        } else {
            return $this->index();
        }
    }

    public function latest_posts() {
        $professionals = User::whereHas('roles', function($q) {$q->where('name', 'User');})
            ->orderBy('cgpa', 'desc')->take(5)->with('professional_category')->get();

        return response()->json([
            'professionals' => $professionals,
        ], 200);
    }
}