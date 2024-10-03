<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;

use Illuminate\Support\Facades\Gate;

class BlogController extends Controller
{

    public function __construct(){
        $this->middleware('permission:All Blogs', ['only' => ['index']]);
        $this->middleware('permission:Create Blog', ['only' => ['create']]);
        $this->middleware('permission:Edit Blog', ['only' => ['edit']]);
        $this->middleware('permission:Delete Blog', ['only' => ['destroy']]);
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $keyword = request('search');

        $title = "All Blog";

        $blogs = Blog::where('title','like', '%'.$keyword.'%')
                ->orWhere('excerpt','like', '%'.$keyword.'%')
                ->orWhere('content','like', '%'.$keyword.'%')
                ->orderBy('id', 'desc') -> paginate('10');

        return view ("admin.blog.all_blog", compact('keyword','title','blogs'));

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view ('admin.blog.create_blog',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'thumbnail' => 'required|image|mimes:png,jpg,jpeg',
            'excerpt' => 'required',
            'content' => 'required',
        ]);

        $blog = new Blog;

        $blog->title = $request->title;
        $blog->slug = implode( '-' , explode ( ' ', $request->title )) . '-' . time() ;

        $thumbnail_name = $request->file('thumbnail')->hashname();
        $request->file('thumbnail')->storeAs('public/images', $thumbnail_name);

        $blog->thumbnail = $thumbnail_name ;

        $blog->excerpt      = $request->excerpt;
        $blog->content      = $request->content;
        $blog->category_id  = $request->category_id;
        $blog->user_id      = auth()->user()->id;
        $blog->user_photo   = auth()->user()->user_photo;
        $blog->views        = 0;

        $blog -> save();

        return redirect()->route('blog.index') ->with('message', 'Blog Published');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {


    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        $categories = Category::all();
        $cat = $blog->category;

        // dd($cat);
        return view('admin.blog.edit_blog', compact('blog', 'categories', 'cat'));
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $blog = Blog::find($id);
        $blog->title = $request->title;

        $blog->slug = implode( '-' , explode ( ' ', $request->title )) . '-' . time() ;

        if($request->file('thumbnail') != null ){

            $thumbnail_name = $request->file('thumbnail')->hashname();

            $request->file('thumbnail')->storeAs('public/images', $thumbnail_name);

            $blog->thumbnail = $thumbnail_name ;
        }

        $blog->excerpt      = $request->excerpt;
        $blog->content      = $request->content;
        $blog->category_id  = $request->category_id;
        $blog->user_id      = auth()->user()->id;
        $blog->user_photo   = auth()->user()->user_photo;
        $blog->views        = 0;

        $blog -> save();
        return redirect()->route('blog.index')->with('message', 'Blog Updated Successfully!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();


        return back()->with('danger', 'Blog Delete Successfully!');
    }





}
