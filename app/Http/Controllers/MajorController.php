<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Http\Requests\StoreMajorRequest;
use App\Http\Requests\UpdateMajorRequest;
use App\Http\Resources\MajorResource;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->limit == 'all') {
            $majors = Major::all();
            $majorData = $majors->map(function ($major) {
                 if ($major->status)
                    return[
                        'name' => $major->name,
                        'id' => $major->id,
                        // Giữ lại các giá trị khác mà bạn muốn bao gồm trong mảng mới
                    ];
            })->filter();
            return response()->json($majorData);
        }
        return MajorResource::collection(Major::paginate($request->limit));
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
     * @param  \App\Http\Requests\StoreMajorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMajorRequest $request)
    {
        Major::create([
            'name' => $request->name,
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
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function show(Major $major)
    {
        return new MajorResource($major);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function edit(Major $major)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMajorRequest  $request
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMajorRequest $request, Major $major)
    {
        $major->update($request->all());
        return response()->json([
            'message' => 'Thay đổi thành công!',
            'status' => 200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function destroy(Major $major)
    {
        $status =  $major->delete();
        if ($status) {
            return response()->json([
                'message' => 'Xóa thành công!',
                'status' => 200
            ]);
        }

    }

    public function updateStatus(Request $request, Major $major)
    {
        $major ->update([
            'status' => $request->status ? 0 : 1
        ]);
        return new MajorResource($major);
    }
}
