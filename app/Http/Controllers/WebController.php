<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('home', [
            'title' => "Home Page",
        ]);
    }

    public function about()
    {
        return view('about', [
            'title' => "About Page",
        ]);
    }

    public function works()
    {
        return view('works', [
            'title' => "Works Page",
        ]);
    }

    public function services()
    {
        return view('services', [
            'title' => "Services Page",
        ]);
    }

    public function contact()
    {
        return view('contact', [
            'title' => "Contact Page",
        ]);
    }

    public function blog()
    {

        $serch_blog_value = request('search') ;
        $title = "All Blogs";

        $all_blog = Blog::where('title','like', '%'.$serch_blog_value.'%')
        ->orWhere('excerpt','like', '%'.$serch_blog_value.'%')
        ->orWhere('content','like', '%'.$serch_blog_value.'%')->paginate(6);

        $latest_blog = Blog::paginate(3);
        $all_category = Category::all();

        return view('blog', [
            'blogs' => $all_blog,
            'title' => $title,
            'latest_blogs' => $latest_blog,
            'categorys' => $all_category,
        ]);


    }

    public function blog_details(Blog $slug )
    {
        $slug->increment('views');

        return view('blog_details',[
            'blog_detail' => $slug
        ]);
    }

    public function category_blogs(Category $category)
    {


        $latest_blog = Blog::paginate(3);
        $all_category = Category::all();

        return view ('category_blog', [
            'blogs' => $category->blogs,
            'title' => $category->name,

            'latest_blogs' => $latest_blog,
            'categorys' => $all_category,
        ]);
    }

    public function user_blog(User $user)
    {

        // dd($user);

        $latest_blog = Blog::paginate(3);
        $all_category = Category::all();

        return view ('category_blog', [
            'blogs' => $user->blogs,
            'title' => $user->name,

            'latest_blogs' => $latest_blog,
            'categorys' => $all_category,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
