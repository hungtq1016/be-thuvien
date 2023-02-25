<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookAdmin;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->limit == 'all') {
            $books = Book::all();
            $bookData = $books->map(function ($book) {
                 if ($book->status)
                    return[
                        'name' => $book->name,
                        'id' => $book->id,
                        // Giữ lại các giá trị khác mà bạn muốn bao gồm trong mảng mới
                    ];
            })->filter();
            return response()->json($bookData);
        }
        return ($request->author=='admin')?
        BookAdmin::collection(Book::all()):
        BookResource::collection(Book::paginate($request->limit));
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
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
            $name = $request->name;
            $slug = Str::slug($name,'-');
            $book = Book::create([
                'name'=> $name,
                'slug'=> $slug,
                'country'=> $request->country,
                'desc'=> $request->desc,
                'release'=> $request->release,
                'image_id'=> $request->image_id,
                'major_id'=> $request->major_id,
                'publisher_id'=> $request->publisher_id,
                'language_id'=>$request->language_id,
                'bookshelf_id'=> $request->bookshelf_id,
                'series_id'=> $request->series_id,
                'status'=> 1,
            ]);
            $book->tags()->attach($request->tags);
            $book->authors()->attach($request->authors);
            $book->categories()->attach($request->categories);
            return response()->json([
                'message' => 'Thêm thành công!',
                'status' => 201
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book,Request $request)
    {
        if($request->limit == 'all') {
            $books = Book::all();
            $bookData = $books->map(function ($book) {
                 if ($book->status)
                    return[
                        'name' => $book->name,
                        'id' => $book->id,
                        // Giữ lại các giá trị khác mà bạn muốn bao gồm trong mảng mới
                    ];
            })->filter();
            return response()->json($bookData);
        }
        return ($request->author=='admin')?
         new BookAdmin($book):
         new BookResource($book);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
            $name = $request->name;
            $slug = Str::slug($name,'-');
            $book ->update([
                'name'=> $name,
                'slug'=> $slug,
                'country'=> $request->country,
                'desc'=> $request->desc,
                'release'=> $request->release,
                'image_id'=> $request->image_id,
                'major_id'=> $request->major_id,
                'publisher_id'=> $request->publisher_id,
                'language_id'=>$request->language_id,
                'bookshelf_id'=> $request->bookshelf_id,
                'series_id'=> $request->series_id,
            ]);
            $book->tags()->sync($request->tags);
            $book->authors()->sync($request->authors);
            $book->categories()->sync($request->categories);

            return response()->json([
            'message' => 'Thay đổi thành công!',
            'status' => 200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $status =  $book->delete();
        if ($status) {
            return response()->json([
                'message' => 'Xóa thành công!',
                'status' => 200
            ]);
        }

    }

    public function updateStatus(Request $request, Book $book)
    {
        $book ->update([
            'status' => $request->status ? 0 : 1
        ]);
        return new BookResource($book);
    }
}
