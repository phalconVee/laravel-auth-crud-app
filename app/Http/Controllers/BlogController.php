<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('blog.index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request, [
          'title' => 'required',
          'description' => 'required',
        ]);

        //create new Database
        $blog = new blog;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->save();

        return redirect()->route('blog.index')
                ->with('message', 'Data has been saved!')
				        ->with('status', 'success');
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
        $blog = Blog::findOrFail($id);
        //return to the edit view page
        return view('blog.edit', compact('blog'));
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
        //validate
        $this->validate($request, [
          'title' => 'required',
          'description' => 'required',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->save();
        return redirect()->route('blog.index')
                ->with('message', 'Data has been updated!')
				        ->with('status', 'success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete blog post
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('blog.index')
                ->with('message', 'Data has been deleted!')
                ->with('status', 'warning');

    }
}
