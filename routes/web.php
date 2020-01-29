<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Basic index, auth and dashboard routes
Route::get('/', function () {
    return view('public.index');
});
Auth::routes();
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

// Post routes
// Route::get('/{anypath}', 'HomeController@index')->where('path','.*');

// Admin routes used to access the admin dashboard
Route::group(['middleware' => ['auth']], function () {
    // Category routes
    // Blog
    Route::get('/blog/category', 'BlogCategoryController@index');
    Route::post('/blog/add-category', 'BlogCategoryController@add_category');
    Route::get('/blog/editcategory/{id}', 'BlogCategoryController@edit_category');
    Route::post('/blog/update-category/{id}', 'BlogCategoryController@update_category');
    Route::get('/blog/category/{id}', 'BlogCategoryController@delete_category');
    Route::get('/blog/delete-categories/{ids}', 'BlogCategoryController@delete_categories');
    // Vacancy
    Route::get('/vacancy/category', 'VacancyCategoryController@index');
    Route::post('/vacancy/add-category', 'VacancyCategoryController@add_category');
    Route::get('/vacancy/editcategory/{id}', 'VacancyCategoryController@edit_category');
    Route::post('/vacancy/update-category/{id}', 'VacancyCategoryController@update_category');
    Route::get('/vacancy/category/{id}', 'VacancyCategoryController@delete_category');
    Route::get('/vacancy/delete-categories/{ids}', 'VacancyCategoryController@delete_categories');
    // Professional
    Route::get('/professional/category', 'ProfessionalCategoryController@index');
    Route::post('/professional/add-category', 'ProfessionalCategoryController@add_category');
    Route::get('/professional/editcategory/{id}', 'ProfessionalCategoryController@edit_category');
    Route::post('/professional/update-category/{id}', 'ProfessionalCategoryController@update_category');
    Route::get('/professional/category/{id}', 'ProfessionalCategoryController@delete_category');
    Route::get('/professional/delete-categories/{ids}', 'ProfessionalCategoryController@delete_categories');

    // Post routes
    // Blog
    Route::get('/blog/post/admin', 'BlogPostController@index');
    Route::post('/blog/add-post', 'BlogPostController@add_post');
    Route::get('/blog/editpost/{id}', 'BlogPostController@edit_post');
    Route::post('/blog/update-post/{id}', 'BlogPostController@update_post');
    Route::get('/blog/post/{id}', 'BlogPostController@delete_post');
    // Vacancy
    Route::get('/vacancy/post/admin', 'VacancyPostController@index');
    Route::post('/vacancy/add-post', 'VacancyPostController@add_post');
    Route::get('/vacancy/editpost/{id}', 'VacancyPostController@edit_post');
    Route::post('/vacancy/update-post/{id}', 'VacancyPostController@update_post');
    Route::get('/vacancy/post/{id}', 'VacancyPostController@delete_post');

    // Routes for admin views
    Route::get('/dashboard/{any?}', function ($any = null) {
        return view('admin.adminmaster');
    })->where('any', '.*');
    // Route::get('/dashboard/{any}', 'HomeController@index');
    // Route::get('/dashboard/{any}/{id}', function () {return view('admin.adminmaster');});
    // Route::get('/dashboard/{any1}/{any2}/{id}', function () {return view('admin.adminmaster');});
});

// Public views routing
// Blog
Route::get('/blog/post', 'BlogController@index');
Route::get('/blog/single-post/{id}', 'BlogController@get_post_by_id');
Route::get('/blog/side-categories', 'BlogController@get_side_categories');
Route::get('/blog/category-posts/{id}', 'BlogController@get_category_posts');
Route::get('/blog/search-posts', 'BlogController@search_posts');
Route::get('/blog/latest-posts', 'BlogController@latest_posts');

// Vacancy
Route::get('/vacancy/post', 'VacancyController@index');
Route::get('/vacancy/single-post/{id}', 'VacancyController@get_post_by_id');
Route::get('/vacancy/side-categories', 'VacancyController@get_side_categories');
Route::get('/vacancy/category-posts/{id}', 'VacancyController@get_category_posts');
Route::get('/vacancy/search-posts', 'VacancyController@search_posts');
Route::get('/vacancy/latest-posts', 'VacancyController@latest_posts');

// Professional
Route::get('/professional/post', 'ProfessionalsController@index');
Route::get('/professional/single-post/{id}', 'ProfessionalsController@get_post_by_id');
Route::get('/professional/side-categories', 'ProfessionalsController@get_side_categories');
Route::get('/professional/category-posts/{id}', 'ProfessionalsController@get_category_posts');
Route::get('/professional/search-posts', 'ProfessionalsController@search_professionals');
Route::get('/professional/latest-posts', 'ProfessionalsController@latest_posts');

// Routes for public views
Route::get('{any?}', function ($any = null) {
    return view('public.index');
})->where('any', '.*');
// Route::get('/{any}', function () {return view('public.index');});
// Route::get('/{any}/{id}', function () {return view('public.index');});
// Route::get('/{any3}/{any4)/{id}', function () {return view('public.index');});
