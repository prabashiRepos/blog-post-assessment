<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BlogController extends Controller
{

    /**
     * @param array $data
     * @return mixed
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            
			'title' => 'required|string|min:1|max:255',
			'content' => 'nullable|min:3|max:1000',
			'category' => 'integer|max:11',
			'image' => 'nullable|image',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderby('created_at')->paginate(5);
        return view('blogs.index')->with('blogs',$blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $blog = Blog::create($request->all());

        
        if ($request->file('image')) {
            $time = Carbon::now();
            $fileInput = $request->file('image');
            $extension = $fileInput->getClientOriginalExtension();
            $directory = date_format($time, 'Y') . '/' . date_format($time, 'm');
            $filename = Str::random(5) . date_format($time, 'd') . rand(1, 9) . date_format($time, 'h') . "." . $extension;
            $fileInput->storeAs($directory, $filename, 'public');
            $blog->thumbnail = $directory . '/' . $filename;
            $blog->save();
        }
        $request->session()->flash('alert-success', 'Blog Created successfully');
        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::where('id',$id)->firstOrFail();
        return view('blogs.show')->with('blog',$blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::where('id',$id)->firstOrFail();
        return view('blogs.edit')->with('blog',$blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::where('id',$id)->firstOrFail();
        $this->validator($request->all())->validate();
        
        $blog->update($request->all());

        
        if ($request->file('image')) {
            $time = Carbon::now();
            $fileInput = $request->file('image');
            $extension = $fileInput->getClientOriginalExtension();
            $directory = date_format($time, 'Y') . '/' . date_format($time, 'm');
            $filename = Str::random(5) . date_format($time, 'd') . rand(1, 9) . date_format($time, 'h') . "." . $extension;
            $fileInput->storeAs($directory, $filename, 'public');
            $blog->thumbnail = $directory . '/' . $filename;
            $blog->save();
        }
        $request->session()->flash('alert-success', 'Blog Updated successfully');
        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $blog = Blog::where('id',$id)->firstOrFail();
        $blog->delete();
        $request->session()->flash('alert-success', 'Blog Deleted successfully');
        return redirect()->route('blogs.index');
    }
}
