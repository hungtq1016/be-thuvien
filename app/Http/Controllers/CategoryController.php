<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\ModalCollection;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return CategoryResource::collection(Category::paginate($request->limit));
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
    public function store(StoreCategoryRequest $request)
    {
        $request->validated($request->all());
        $name = $request->name;
        $slug = Str::slug($name,'-');
        $category = Category::create([
            'name' => $request->name,
            'slug' => $slug,
            'status' => 1,
        ]);

        return new CategoryResource($category);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return new CategoryResource($category->loadCount('books'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $request->validated($request->all());
        $name = $request->name;
        $slug = Str::slug($name,'-');
        $category->update([
            'name' => $name,
            'slug' => $slug
        ]);

        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        return $category->delete();
    }

    public function updateStatus(Request $request, Category $category)
    {
        $category ->update([
            'status' => $request->status ? false : true
        ]);
        return new CategoryResource($category);

    }

    public function fieldsToAdd()
    {
        return '123';
    }

}
