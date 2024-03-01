<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    /**
     * @param array $data
     * @return mixed
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            
			'name' => 'required|string|min:1|max:255',
			'description' => 'nullable|min:3|max:1000',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderby('created_at','desc')->paginate(25);
        return view('categories.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
        
        $category = Category::create($request->all());

        
        if ($request->file('thumbnail')) {
            $time = Carbon::now();
            $category->save();
        }
        $request->session()->flash('alert-success', 'Category Created successfully');
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::where('id',$id)->firstOrFail();
        return view('categories.show')->with('category',$category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('id',$id)->firstOrFail();
        return view('categories.edit')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::where('id',$id)->firstOrFail();
        $this->validator($request->all())->validate();
        
        $category->update($request->all());
        $request->session()->flash('alert-success', 'Category Updated successfully');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $category = Category::where('id',$id)->firstOrFail();
        $category->delete();
        $request->session()->flash('alert-success', 'Category Deleted successfully');
        return redirect()->route('categories.index');
    }
}
