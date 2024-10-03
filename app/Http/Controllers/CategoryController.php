<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;

class CategoryController extends Controller
{

    public function __construct(){
        $this->middleware('permission:All Categorys', ['only' => ['index']]);
        $this->middleware('permission:Create Category', ['only' => ['create']]);
        $this->middleware('permission:Edit Category', ['only' => ['edit']]);
        $this->middleware('permission:Delete Category', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyword = request('search');

        $title = "All Category";

        $categoryes = Category::where('name','like', '%'.$keyword.'%')
        ->orWhere('slug','like', '%'.$keyword.'%')
        ->orderBy('id', 'desc') ->paginate(5);



        return view ("admin.category.all_category", compact('keyword','title','categoryes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view ('admin.category.all_category', compact('categoryes' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->slug = strtolower(implode( '-' , explode ( ' ', $request->name )));

        if ($category->save()){
            return back()->with('message', 'Category has been saved!');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $title = "Edit Categori";
        $category = Category::find($id);

        $keyword = request('search');

        $categoryes = Category::where('name','like', '%'.$keyword.'%')
        ->orWhere('slug','like', '%'.$keyword.'%')
        ->orderBy('id', 'desc') ->paginate(5);

        // dd($cat);
        return view('admin.category.edit_category', compact('category', 'title', 'categoryes', 'keyword' ));
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
        $category = Category::find($id);
        $category->name = $request->name;

        $category->slug = strtolower( implode( '-' , explode ( ' ', $request->name )));

        $category->save();
        return back()->with('message', 'Category Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        $renew_category = request('renew_category');

        // this is for set defolt category

        // $category->posts()->update(['category_id'=> 24]);

        $category->blogs()->update(['category_id' => $renew_category]);

        return redirect()->route('category.index')->with('danger', 'Category Removed Successfully!');


    }
}
