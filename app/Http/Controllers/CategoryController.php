<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryCollection;
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
        if($request->limit == 'all') {
            $categories = Category::all();
            $categoryData = $categories->map(function ($category) {
                 if ($category->status)
                    return[
                        'name' => $category->name,
                        'id' => $category->id,
                        // Giữ lại các giá trị khác mà bạn muốn bao gồm trong mảng mới
                    ];            
            })->filter();
            return response()->json($categoryData);
        }
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
        if ($request->image) {
            $image_name = time() . '.' . $request->image->getClientOriginalExtension();
            $image_path = public_path('images');
            $request->image->move($image_path, $image_name);

            $name = $request->name;
            $slug = Str::slug($name,'-');
            $category = Category::create([
                'name' => $name,
                'slug' => $slug,
                'image' =>$image_name,
                'desc' =>$request->desc,
                'status' => 1,
            ]);
            return new CategoryResource($category);
        }else{
            return collect([
                'error'=> 'Có lỗi trong quá trình chuyển file',
                'code' => '204'
            ]);
        }


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
    public function update(Request $request, Category $category)
    {
        $category ->update([
            'name' => $request->name,
            'slug'=>  $request->name,
            'desc' => $request->desc,
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
}
