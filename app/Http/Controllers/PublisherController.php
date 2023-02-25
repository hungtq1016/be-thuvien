<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use App\Http\Resources\PublisherResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->limit == 'all') {
            $publishers = Publisher::all();
            $publisherData = $publishers->map(function ($publisher) {
                 if ($publisher->status)
                    return[
                        'name' => $publisher->name,
                        'id' => $publisher->id,
                        // Giữ lại các giá trị khác mà bạn muốn bao gồm trong mảng mới
                    ];
            })->filter();
            return response()->json($publisherData);
        }
        return PublisherResource::collection(Publisher::paginate($request->limit));
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
     * @param  \App\Http\Requests\StorePublisherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePublisherRequest $request)
    {
        $name = $request->name;
        $slug = Str::slug($name,'-');
        Publisher::create([
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
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function show(Publisher $publisher)
    {
        return new PublisherResource($publisher);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function edit(Publisher $publisher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePublisherRequest  $request
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePublisherRequest $request, Publisher $publisher)
    {
        $name = $request->name;
        $slug = Str::slug($name,'-');
        $publisher->update([
                'name' => $name,
                'slug' => $slug,
                'image_id' =>$request->image_id,
                'desc' =>$request->desc,
            ]);

        return response()->json([
            'message' => 'Thay đổi thành công!',
            'status' => 200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher)
    {
        $status =  $publisher->delete();
        if ($status) {
            return response()->json([
                'message' => 'Xóa thành công!',
                'status' => 200
            ]);
        }

    }

    public function updateStatus(Request $request, Publisher $publisher)
    {
        $publisher ->update([
            'status' => $request->status ? 0 : 1
        ]);
        return new PublisherResource($publisher);
    }
}
