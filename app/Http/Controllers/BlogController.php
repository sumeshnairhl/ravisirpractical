<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;
use DB;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $blogs= Blog::latest()->paginate(3);

            return view('blogs.index',compact('blogs'))->with('i',(request()->input('page',1)-1)*3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allcategory = Category::all();

        return view('blogs.create',compact('allcategory'));
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
                'title'=>'required',
                'category_id'=>'required',
                'description'=>'required'
        ]);

        //Blog::create($request->all());
        
         $blogmod = new Blog();
         $blogmod->category_id = implode(',',$request->input('category_id'));
         $blogmod->title = $request->input('title');
         $blogmod->description = $request->input('description');
         $blogmod->save();

        return redirect()->route('blogs.index')->with('success','Blog Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
      
        $getcatname=Category::all()->whereIn('id',explode(',',$blog->category_id));

        return view('blogs.show',compact('blog','getcatname'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $allcategory = Category::all();
        

        $getcatname = DB::table('categories')->select('id')->whereIn('id',explode(',',$blog->category_id))->get()->pluck('id')->toArray();
     
        return view('blogs.edit',compact('blog','getcatname','allcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
                'title'=>'required',
                'category_id'=>'required',
                'description'=>'required',
        ]);


        //Blog::update($request->all());
                                                                                                                                                                              
        $blogmod = Blog::find($blog->id); 
        $blogmod->update([
                'category_id' =>implode(',',$_POST['category_id']),
                'title' =>$_POST['title'],
                'description' => $_POST['description'],
            ]);

        return redirect()->route('blogs.index')->with('success','Blog Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
          $blog->delete();

          return redirect()->route('blogs.index')
                        ->with('success','Blogs deleted successfully');
    }
}
