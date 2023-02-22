<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateTagRequest;
use App\Http\Resources\TagResource;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->limit == 'all') {
            $tags = Tag::all();
            $tagData = $tags->map(function ($tag) {
                 if ($tag->status)
                    return[
                        'name' => $tag->name,
                        'id' => $tag->id,
                        // Giữ lại các giá trị khác mà bạn muốn bao gồm trong mảng mới
                    ];            
            })->filter();
            return response()->json($tagData);
        }
        return TagResource::collection(Tag::paginate($request->limit));
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
     * @param  \App\Http\Requests\StoreTagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTagRequest $request)
    {
        if ($request->image) {
            $image_name = time() . '.' . $request->image->getClientOriginalExtension();
            $image_path = public_path('images');
            $request->image->move($image_path, $image_name);

            $name = $request->name;
            $slug = Str::slug($name,'-');
            $author = Tag::create([
                'name' => $name,
                'slug' => $slug,
                'image' =>$image_name,
                'desc' =>$request->desc,
                'status' => 1,
            ]);
            return new TagResource($author);
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
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return new TagResource($tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTagRequest  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag ->update([
            'status' => $request->status ? false : true
        ]);
        return new TagResource($tag);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        return $tag->delete();
    }
    public function updateStatus(Request $request,Tag $tag)
    {
        $tag ->update([
            'status' => $request->status ? false : true
        ]);
        return new TagResource($tag);

    }
}
