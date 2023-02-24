<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Http\Resources\AuthorResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->limit == 'all') {
            $authors = Author::all();
            $authorData = $authors->map(function ($author) {
                 if ($author->status)
                    return[
                        'name' => $author->name,
                        'id' => $author->id,
                        // Giữ lại các giá trị khác mà bạn muốn bao gồm trong mảng mới
                    ];
            })->filter();
            return response()->json($authorData);
        }
        return AuthorResource::collection(Author::paginate($request->limit));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAuthorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorRequest $request)
    {
        $image = $request->image;
        if ($image != 'undefined') {
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image_path = public_path('images');
            $image->move($image_path, $image_name);
            $image = getenv('IMG_URL').$image_name;
        }else{
            $image = getenv('IMG_URL').'dummy.jpg';
        }
            $name = $request->name;
            $slug = Str::slug($name,'-');
            Author::create([
                'name' => $name,
                'slug' => $slug,
                'image' =>$image,
                'gender' =>$request->gender,
                'yob' =>$request->yob,
                'yod' =>$request->yod,
                'country' =>$request->country,
                'status' => 1,
            ]);
            return response()->json([
                'message' => 'Thêm thành công!',
                'status' => 201
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return new AuthorResource($author);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuthorRequest  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Author $author)
    {
        $image = $request->image;
        if ($image != 'undefined' && !filter_var($image, FILTER_VALIDATE_URL)) {
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image_path = public_path('images');
            $image->move($image_path, $image_name);
            $image = getenv('IMG_URL').$image_name;
        }else{
            if ($image==filter_var($image, FILTER_VALIDATE_URL)) {
            } else {
                $image = getenv('IMG_URL').'dummy.jpg';
            }
        }
        $name = $request->name;
        $slug = Str::slug($name,'-');
        $author->update([
                'name' => $name,
                'slug' => $slug,
                'image' =>$image,
                'gender' =>$request->gender,
                'yob' =>$request->yob,
                'yod' =>$request->yod,
                'country' =>$request->country,
            ]);

        return response()->json([
            'message' => 'Thay đổi thành công!',
            'status' => 200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $status =  $author->delete();
        if ($status) {
            return response()->json([
                'message' => 'Xóa thành công!',
                'status' => 200
            ]);
        }

    }

    public function updateStatus(Request $request, Author $author)
    {
        $author ->update([
            'status' => $request->status ? 0 : 1
        ]);
        return new AuthorResource($author);
    }
}
