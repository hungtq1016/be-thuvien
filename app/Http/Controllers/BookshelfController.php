<?php

namespace App\Http\Controllers;

use App\Models\Bookshelf;
use App\Http\Requests\StoreBookshelfRequest;
use App\Http\Requests\UpdateBookshelfRequest;
use App\Http\Resources\BookShelfResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookshelfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->limit == 'all') {
            $bookshelves = Bookshelf::all();
            $bookshelfData = $bookshelves->map(function ($bookshelf) {
                 if ($bookshelf->status)
                    return[
                        'name' => $bookshelf->name,
                        'id' => $bookshelf->id,
                        // Giữ lại các giá trị khác mà bạn muốn bao gồm trong mảng mới
                    ];
            })->filter();
            return response()->json($bookshelfData);
        }
        return BookShelfResource::collection(Bookshelf::paginate($request->limit));
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
     * @param  \App\Http\Requests\StoreBookshelfRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookshelfRequest $request)
    {
        Bookshelf::create([
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
     * @param  \App\Models\Bookshelf  $bookshelf
     * @return \Illuminate\Http\Response
     */
    public function show(Bookshelf $bookshelf)
    {
        return new BookshelfResource($bookshelf);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bookshelf  $bookshelf
     * @return \Illuminate\Http\Response
     */
    public function edit(Bookshelf $bookshelf)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookshelfRequest  $request
     * @param  \App\Models\Bookshelf  $bookshelf
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookshelfRequest $request, Bookshelf $bookshelf)
    {
        $bookshelf->update($request->all());
        return response()->json([
            'message' => 'Thay đổi thành công!',
            'status' => 200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bookshelf  $bookshelf
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookshelf $bookshelf)
    {
        $status =  $bookshelf->delete();
        if ($status) {
            return response()->json([
                'message' => 'Xóa thành công!',
                'status' => 200
            ]);
        }

    }

    public function updateStatus(Request $request, Bookshelf $bookshelf)
    {
        $bookshelf ->update([
            'status' => $request->status ? 0 : 1
        ]);
        return new BookshelfResource($bookshelf);
    }
}
