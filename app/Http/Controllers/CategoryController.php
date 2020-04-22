<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreCategory;
use PDF;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderByDesc('id')->paginate(5);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request)
    {
        try {
            $category = Category::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'parent_id' => $request->parent_id,
            ]);
            if ($category)
                return back()->with('success', 'Success - Category Successfully Created.');
            else
                return back()->with('error', 'Error - Error in Created Category.');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    public function createPdf()
    {
        $categories = Category::all();
        $fileName = 'category-pdf'.now()->toDateTimeString().'.pdf';
//        return view('admin.categories.category-pdf', compact('categories'));
        $pdf = PDF::loadView('admin.categories.category-pdf', compact('categories'));
        $pdf->save(public_path().DIRECTORY_SEPARATOR.'category.pdf');
        return $pdf->download($fileName);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::where('id', '!=', $category->id)->get();
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
//        dd('update');
        try {
            $category->title = $request->title;
            $category->slug = $request->slug;
            $category->parent_id = $request->parent_id;

            if($category->save())
                return redirect()->route('category.index')->with('success', 'Category Updated Successfully!');
            else
                return back()->with('error', 'Error Updating Category');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->forceDelete()) {
            return back()->with('success', 'Category Deleted Successfully!');
        } else {
            return back()->with('error', 'Error Deleting Record!');
        }
    }
}
