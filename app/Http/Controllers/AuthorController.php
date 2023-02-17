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
    public function index()
    {
        return AuthorResource::collection(Author::all());
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
        $upload_path = public_path('images');
        $generated_new_name = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move($upload_path, $generated_new_name);

        $name = $request->name;
        $slug = Str::slug($name,'-');
        $author = Author::create([
            'name' => $name,
            'image' =>$generated_new_name,
            'country' =>$request->country,
            'gender' =>$request->gender,
            'yob' =>$request->yob,
            'yod' =>$request->yod,
            'slug' => $slug,
            'status' => 1,
        ]);

        return new AuthorResource($author);

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
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $data = $request->all();
        $request->validated($data);
        if ($request->hasFile('image')) {
            $upload_path = public_path('images');
            $generated_new_name = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move($upload_path, $generated_new_name);
            $data['image'] = $generated_new_name;
        }else{
            unset($data['image']);
        }

        $data['slug'] = Str::slug($data['name'],'-');
        $author ->update($data);
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
            'status' => $request->status,
        ]);
        return new AuthorResource($author);

    }
}
