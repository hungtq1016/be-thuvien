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

        if ($request->image) {
            $image_name = time() . '.' . $request->image->getClientOriginalExtension();
            $image_path = public_path('images');
            $request->image->move($image_path, $image_name);

            $name = $request->name;
            $slug = Str::slug($name,'-');
            $author = Author::create([
                'name' => $name,
                'image' =>$image_name,
                'country' =>$request->country,
                'gender' =>$request->gender,
                'yob' =>$request->yob,
                'yod' =>$request->yod,
                'slug' => $slug,
                'status' => 1,
            ]);
            return new AuthorResource($author);
        }
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
        $author ->update([
            'status' => $request->status ? false : true
        ]);
        return new AuthorResource($author);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        return $author->delete();
    }
    public function updateStatus(Request $request,Author $author)
    {
        $author ->update([
            'status' => $request->status ? false : true
        ]);
        return new AuthorResource($author);

    }
}
