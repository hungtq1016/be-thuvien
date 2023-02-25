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
        $name = $request->name;
            $slug = Str::slug($name,'-');
            Tag::create([
                'name' => $name,
                'slug' => $slug,
                'image_id' =>$request->image_id,
                'desc' =>$request->desc,
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
        $name = $request->name;
        $slug = Str::slug($name,'-');
        $tag->update([
            'name' => $name,
            'slug' => $slug,
            'image_id' =>$request->image_id,
            'desc' =>$request->desc,
            'status' => 1,
        ]);
        return response()->json([
            'message' => 'Thay đổi thành công!',
            'status' => 200
        ]);
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
